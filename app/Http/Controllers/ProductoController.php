<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\Disenio;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * LISTADO DE PRODUCTOS
     */
    public function index(Request $request)
    {
        $query = Producto::with(['categoria', 'disenio']);

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;

            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'LIKE', "%{$buscar}%")
                    ->orWhere('codigo', 'LIKE', "%{$buscar}%")
                    ->orWhere('descripcion', 'LIKE', "%{$buscar}%");
            });
        }

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        $productos = $query->orderBy('id', 'desc')->get();

        $categorias = CategoriaProducto::orderBy('nombre')->get();
        $disenios = Disenio::orderBy('nombre')->get();

        return view('catalogo_productos', compact('productos', 'categorias', 'disenios'));
    }

    /**
     * DETALLE DEL PRODUCTO
     */
    public function show($id)
    {
        $producto = Producto::with(['categoria', 'disenio', 'artesanas.persona'])
            ->findOrFail($id);

        return view('detalle_producto', compact('producto'));
    }

    /**
     * GUARDAR PRODUCTO NUEVO
     */
    public function store(Request $request)
    {
        // Si el select de diseño viene vacío ("Sin diseño"), lo convertimos
        // a null para que la regla "nullable" funcione de verdad.
        $request->merge([
            'disenio_id' => $request->disenio_id ?: null,
        ]);

        $request->validate([
            'codigo'       => ['required', 'unique:productos,codigo'],
            'nombre'       => ['required', 'string', 'max:150'],
            'categoria_id' => ['required', 'exists:categorias_productos,id'],
            'disenio_id'   => ['nullable', 'exists:disenios,id'],
            'precio_venta' => ['required', 'numeric'],
            'stock'        => ['required', 'integer', 'min:0'],
            'estado'       => ['required', 'in:disponible,agotado,reservado'],
            'imagen'       => ['nullable', 'image', 'max:4096'],
        ]);

        $rutaImagen = $this->guardarImagen($request);

        Producto::create([
            'codigo'         => $request->codigo,
            'nombre'         => $request->nombre,
            'descripcion'    => $request->descripcion,
            'categoria_id'   => $request->categoria_id,
            'disenio_id'     => $request->disenio_id,
            'precio_compra'  => $request->precio_compra ?? 0,
            'precio_venta'   => $request->precio_venta,
            'stock'          => $request->stock,
            'stock_minimo'   => $request->stock_minimo ?? 0,
            'imagen'         => $rutaImagen,
            'estado'         => $request->estado,
            'fecha_creacion' => now(),
        ]);

        return redirect()
            ->route('productos')
            ->with('success', 'Producto registrado correctamente');
    }

    /**
     * ACTUALIZAR PRODUCTO
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->merge([
            'disenio_id' => $request->disenio_id ?: null,
        ]);

        $request->validate([
            'nombre'       => ['required', 'string', 'max:150'],
            'categoria_id' => ['required', 'exists:categorias_productos,id'],
            'disenio_id'   => ['nullable', 'exists:disenios,id'],
            'precio_venta' => ['required', 'numeric'],
            'stock'        => ['required', 'integer', 'min:0'],
            'estado'       => ['required', 'in:disponible,agotado,reservado'],
            'imagen'       => ['nullable', 'image', 'max:4096'],
        ]);

        $rutaImagen = $producto->imagen;

        if ($request->hasFile('imagen')) {
            // borramos la imagen anterior si existe
            $this->eliminarImagen($producto->imagen);
            $rutaImagen = $this->guardarImagen($request);
        }

        $producto->update([
            'nombre'        => $request->nombre,
            'descripcion'   => $request->descripcion,
            'categoria_id'  => $request->categoria_id,
            'disenio_id'    => $request->disenio_id,
            'precio_compra' => $request->precio_compra ?? 0,
            'precio_venta'  => $request->precio_venta,
            'stock'         => $request->stock,
            'stock_minimo'  => $request->stock_minimo ?? 0,
            'imagen'        => $rutaImagen,
            'estado'        => $request->estado,
        ]);

        return redirect()
            ->route('productos')
            ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * ELIMINAR PRODUCTO
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $this->eliminarImagen($producto->imagen);

        $producto->delete();

        return redirect()
            ->route('productos')
            ->with('success', 'Producto eliminado correctamente');
    }

    /**
     * Guarda la imagen subida dentro de public/uploads/productos
     * y devuelve la ruta relativa (ej: uploads/productos/167xxx.jpg)
     * para guardarla en la BD.
     */
    private function guardarImagen(Request $request): ?string
    {
        if (! $request->hasFile('imagen')) {
            return null;
        }

        $archivo = $request->file('imagen');
        $nombreArchivo = uniqid('prod_') . '.' . $archivo->getClientOriginalExtension();

        // move() crea la carpeta automáticamente si no existe
        $archivo->move(public_path('uploads/productos'), $nombreArchivo);

        return 'uploads/productos/' . $nombreArchivo;
    }

    /**
     * Elimina físicamente el archivo de imagen si existe.
     */
    private function eliminarImagen(?string $rutaImagen): void
    {
        if (! $rutaImagen) {
            return;
        }

        $rutaCompleta = public_path($rutaImagen);

        if (file_exists($rutaCompleta)) {
            unlink($rutaCompleta);
        }
    }
}
