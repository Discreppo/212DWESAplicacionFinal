/**
 * Author original:  Carlos García Cachón
 * Author: Oscar Pascual Ferrero
 * Created: 17 ene 2024
 */

-- Elimino el usuario de la base de datos
DROP USER  user212DWESLoginLogoffTema5;

-- Cambio a una base de datos diferente antes de eliminarla (En este caso la que crea por defecto 'mysql')
USE mysql;

-- Elimino la base de datos
DROP DATABASE DB212DWESLoginLogoffTema5;
