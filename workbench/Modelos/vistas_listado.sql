CREATE VIEW vw_puntaje_software AS SELECT
    pun.id,
    AVG(pun.puntuacion) as puntuaje,
    sof.id as idSoft
FROM
    puntuacion pun
JOIN software sof ON sof.puntuacion_id = pun.id 
GROUP BY sof.id;

CREATE VIEW vw_detalle_software AS SELECT
    soft.*,
    lic.id as idLicencia
    lic.nombre as nombre_licencia,
    lic.descripcion as descripcion_licencia, 
    inf.id as idInformacion
    inf.descripcion as informacion_descripcion,
    inf.version as informacion_version,
    inf.requisitos as informacion_requisitos,
    inf.fecha_lanzamiento as informacion_fecha_lanzamiento,
    inf.elnace as informacion_enlace
    inf.desarrollador_id,
    des.id as idDesarrolador
    des.nombre as desarrollador_nombre, 
    des.biografia as desarrollador_biografia,
    des.sitio_web as desarrollador_sitio_web,
    cat.categoria.id as idCategoria,
    cat.categoria.nombre as categoria_nombre
FROM 
    software soft
INNER JOIN categoria cat on cat.id = soft.categoria_id
INNER JOIN informacion inf ON inf.id = soft.informacion_id
INNER JOIN licencia lic ON lic.id = soft.licencia_id
INNER JOIN desarrollador des ON des.id = inf.desarrollador_id;

CREATE VIEW vw_detalle_basico_software AS SELECT
    sof.id, 
    sof.nombre, 
    sof.precio, 
    lic.nombre as lincencia 
FROM 
    software sof
INNER JOIN licencia lic on lic.id = sof.licencia_id;
