<?php

    include('conexion.php');

    function obtenerCliente($idCliente)
    {
        $sql = "SELECT * FROM clientes WHERE idCliente = '$idCliente';";
        $query = consulta($sql);
        return $query;
    }

    function productoEspecifico($idProducto)
    {
        $sql = "SELECT * FROM productos WHERE idProducto = '$idProducto';";
        $query = consulta($sql);
        return $query;
    }

    function productosRelacionados($categoria)
    {
        $cadena = substr($categoria,0,3);
        $sql = "SELECT foto, categoria FROM productos WHERE categoria LIKE '$cadena%';";
        $query = consulta($sql);
        return $query;
    }

    function proveedoresActuales()
    {
        $sql = "SELECT foto FROM proveedores;";
        $query = consulta($sql);
        return $query;
    }

    function productosCarrito($idCliente)
    {
        $sql = "SELECT c.idCarrito, c.idProducto, p.cantidad AS inventario, c.total, c.cantidad, p.nombre, p.foto
                FROM carritos c, productos p
                WHERE c.vigente = TRUE AND c.comprado = FALSE AND c.idProducto = p.idProducto AND idCliente = '$idCliente';";
        $query = consulta($sql);
        return $query;      
    }

    function removerCarrito($idCarrito)
    {
        $sql = "UPDATE carritos
                SET vigente = FALSE
                WHERE idCarrito = '$idCarrito';";
        $query = consulta($sql);
        return $query;      
    }

    function actualizarCarrito($idCarrito,$cantidad,$precio)
    {
        $sql = "UPDATE carritos
                SET vigente = TRUE, cantidad = '$cantidad', total = '$precio'
                WHERE idCarrito = '$idCarrito';";
        $query = consulta($sql);
        return $query;      
    }

    function obtenerDireccion($idCliente)
    {
        $sql = "SELECT * FROM direcciones WHERE idCliente = '$idCliente';";
        $rows = consulta($sql);
        //idDireccion, nombre, direccion, estado, ciudad, cp, numTelefono, correo, idCliente
        $array = array(0,'','','','',null,'','',0);
        $clientes = obtenerCliente($idCliente);

        if(mysqli_num_rows($rows) == 0)
        {
            while($rm = mysqli_fetch_array($clientes))
            {
                $array[1] = utf8_encode($rm['nombre']);
                $array[2] = utf8_encode($rm['domicilio']);
                $array[6] = $rm['numTelefono'];
                $array[7] = $rm['correo'];
                $array[8] = $rm['idCliente'];
            }

        }else
        {
            while($ri = mysqli_fetch_array($rows))
            {
                $array[0] = $ri['idDireccion'];
                $array[1] = utf8_encode($ri['nombre']);
                $array[2] = utf8_encode($ri['direccion']);
                $array[3] = utf8_encode($ri['estado']);
                $array[4] = utf8_encode($ri['ciudad']);
                $array[5] = $ri['cp'];
                $array[6] = $ri['numTelefono'];
                $array[7] = $ri['correo'];
                $array[8] = $ri['idCliente'];
            }
        }
        
        return $array;
    }

    function obtenerTarjetas($idCliente)
    {
        $sql = "SELECT * FROM tarjetas WHERE idCliente = '$idCliente';";
        $rows = consulta($sql);
        //idTarjeta, tipo, numTarjeta, nombreTarjeta, fechaVencimiento, cvv, idCliente
        $array = array(0,'',null,'','',null,0);

        if(mysqli_num_rows($rows) == 0)
        {
            $array = array(0,'',null,'','',null,0);
        }else
        {
            while($ri = mysqli_fetch_array($rows))
            {
                $array[0] = $ri['idTarjeta'];
                $array[1] = $ri['tipo'];
                $array[2] = $ri['numTarjeta'];
                $array[3] = utf8_encode($ri['nombreTarjeta']);
                $array[4] = $ri['fechaVencimiento'];
                $array[5] = $ri['cvv'];
                $array[6] = $ri['idCliente'];
            }
        }

        return $array;
    }

    function ultimaTarjeta()
    {
        $indice = array(1);
        $sql = "SELECT idTarjeta FROM tarjetas ORDER BY idTarjeta DESC LIMIT 1;";
        $query = consulta($sql);
        if(mysqli_num_rows($query) != 0)
        {
            while($rU = mysqli_fetch_array($query)):
                $indice = array($rU['idTarjeta']);
            endwhile;
        }
        return $indice[0];
    }

    function ultimaDireccion()
    {
        $indice = array(1);
        $sql = "SELECT idDireccion FROM direcciones ORDER BY idDireccion DESC LIMIT 1;";
        $query = consulta($sql);
        if(mysqli_num_rows($query) != 0)
        {
            while($rU = mysqli_fetch_array($query)):
                $indice = array($rU['idDireccion']);
            endwhile;
        }
        return $indice[0];
    }

    function removerInventario($idProducto,$cantidad)
    {   
        $query = productoEspecifico($idProducto);
        while($rU = mysqli_fetch_array($query))
		{
            $inventario = $rU['cantidad'];
        }

        $cantidad = $inventario - $cantidad;

        $sql = "UPDATE productos
                SET cantidad = '$cantidad'
                WHERE idProducto = '$idProducto';";
        $query = consulta($sql);

        return $query;
    }

    function sumarInventario($idProducto,$cantidad)
    {   
        $query = productoEspecifico($idProducto);
        while($rU = mysqli_fetch_array($query))
		{
            $inventario = $rU['cantidad'];
        }

        $cantidad = $inventario + $cantidad;

        $sql = "UPDATE productos
                SET cantidad = '$cantidad'
                WHERE idProducto = '$idProducto';";
        $query = consulta($sql);

        return $query;
    }

?>