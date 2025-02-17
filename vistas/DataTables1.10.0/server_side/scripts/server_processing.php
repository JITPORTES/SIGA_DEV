<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
  function obtenEvaluaciones($Mes,$Anio,$AcumuladoFiltro,$CveAsistencia,$CveServicio,$CvePregunta,$CveOrigen=-1)
	{
	
				
	   $query_rs = "(

	    select A.CveEvaluacion, CL.Nombre,CL.ApellidoPaterno,CL.ApellidoMaterno,CL.Correo,A.NUMERO_CUENTA,
		CL.Telefono,A.Estado,A.Asistencia,A.CveServicio,A.Servicio,A.FechaEvaluacion,P1,P2,P3,P4,P5,P6,P7,P8,P9,
		Clas1,Clas2,CveOrigen,A.CveAsistencia,case when P1>=0 and P1 <= 6 then -100 
		 when P1>=7 and P1 <= 8 then 0
		 when P1>=9 and P1 <= 10 then 100
		 end as NPS,A.Audio
		from (
		/* Dental */
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=89  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=90  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=91  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion
		and R2.CvePregunta=92  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=93  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=94  limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=95  limit 1) as P7,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=96  limit 1) as P8, 
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=97  limit 1) as P9,
		(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=96 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=96 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G31'

		UNION

		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=98  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=99  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=100  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion
		and R2.CvePregunta=101  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=102  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=103  limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=104  limit 1) as P7,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and (R2.CvePregunta=105 or R2.CvePregunta=78)  limit 1) as P8, 
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=106  limit 1) as P9,
		(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and (R.CvePregunta=105 or R.CvePregunta=78) and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and (R.CvePregunta=105 or R.CvePregunta=78) and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G30'

		UNION

		/* Cerrajero */
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=39  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=40  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=41  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=42  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=43  limit 1) as P5,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=44 limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=86  limit 1) as P7,'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=44 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=44 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G44'


		/*Citas Medicas*/
		UNION
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=51  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=52  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=53  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=54  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=55  limit 1) as P5,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=56 limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=87  limit 1) as P7,'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=56 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=56 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G50'

		/* Electricista*/
		UNION
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=33  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=34  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=35  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=36  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=37  limit 1) as P5,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=38 limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=84  limit 1) as P7,'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=38 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=38 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G42'
		/*UNION
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=71  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=72  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=73  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion
		and R2.CvePregunta=74  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=75  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=76  limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=77  limit 1) as P7,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=77  limit 1) as P8
		,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=77 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=77 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G53'*/
		UNION
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=57  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=58  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=59  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion
		and R2.CvePregunta=60  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=61  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=62  limit 1) as P6,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=63  limit 1) as P7
		,'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=63 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=63 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G51'
		
		
		UNION
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=64  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=65  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=66  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion
		and R2.CvePregunta=67  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=68  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=69  limit 1) as P6,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=70  limit 1) as P7
		,'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=63 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=63 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G52'
		
		/* Paso de Corriente*/
		UNION
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia,
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=21  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=22  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=23  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=24  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=25  limit 1) as P5,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=26  limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=82  limit 1) as P7,'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=26 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=26 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G22'
		UNION
		/*Plomeria*/
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia,
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=27  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=28  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=29  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=30  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=31  limit 1) as P5,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=32  limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=83  limit 1) as P7, '' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=32 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=32 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G41'
		UNION
		/*Suministro Gasolina*/
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia,
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=7  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=8  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=9  limit 1) as P3,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=10  limit 1) as P4,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=11  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=12  limit 1) as P6,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=13  limit 1) as P7,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=80  limit 1) as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=13 and R.CveEvaluacion=E.CveEvaluacion  limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=13 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G21'
		UNION
		/* Cambio de Llanta*/
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia,
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=14  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=15  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=16  limit 1) as P3,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=17  limit 1) as P4,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=18  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=19  limit 1) as P6,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=20  limit 1) as P7,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=81  limit 1) as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=20 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=20 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G23'
		UNION
		/* Vidriero*/
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia,
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=45  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=46  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=47  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=48  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=49  limit 1) as P5,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=50 limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=85  limit 1) as P7,'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=50 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=50 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G43'
		UNION
		/* Servicio de Grua*/
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia,
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=1  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=2  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=3  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=4  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=5  limit 1) as P5,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=6  limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=79  limit 1) as P7,
		'' as P8,'' as P9,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=6 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=6 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G01' 
		UNION
		select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio, 
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=71  limit 1) as P1,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=72  limit 1) as P2,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=73  limit 1) as P3,
		(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion
		and R2.CvePregunta=74  limit 1) as P4,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=75  limit 1) as P5,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=76  limit 1) as P6,
		(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion 
		and R2.CvePregunta=77  limit 1) as P7,
		(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=77  limit 1) as P8,'' as P9
		,(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		and R.CvePregunta=77 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		and R.CvePregunta=77 and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado
		from Evaluacion E where CveServicio='G53'
	   
		) A,Cliente CL where A.NUMERO_CUENTA=CL.CveCliente ";

	    if ($CveAsistencia != "")
	    $query_rs .= " and A.CveAsistencia=".$CveAsistencia;  
   
		if ($CveServicio != "")
	    $query_rs .= " and A.CveServicio='".$CveServicio."'";  
   
		if ($CvePregunta != "")
	    $query_rs .= " and A.CvePregunta=".$CvePregunta;  
   
       	if ($CveOrigen != -1)
		$query_rs .= ' and A.CveOrigen='.$CveOrigen;
   
   
		if ($Acumulado == 0)
		$query_rs .= ' and MONTH(A.FechaEvaluacion)='.$Mes;	
		else
		$query_rs .=  " and MONTH(A.FechaEvaluacion)>= 1 and MONTH(A.FechaEvaluacion)<=".$Mes;	

    	$query_rs .= ' and YEAR(A.FechaEvaluacion)='.$Anio;
		
		$query_rs .= ") Tabla ";
   
	    //$query_rs .= " order by A.FechaEvaluacion DESC";
	 
		
		return $query_rs;
	 
	}
	
	session_start();
	$Mes = $_SESSION["mes"];
	$Anio = $_SESSION["anio"];
	$AcumuladoFiltro = $_SESSION["AcumuladoFiltro"];
	$CveOrigen = $_SESSION["CveOrigenFiltro"];
	$CveAsistencia = "";
	$CveServicio = "";
	$CvePregunta = "";

	if (isset($_GET["CveAsistencia"]))
	$CveAsistencia = $_GET["CveAsistencia"];
	if (isset($_GET["CveServicio"]))
	$CveServicio = $_GET["CveServicio"];
	if (isset($_GET["CvePregunta"]))
	$CvePregunta = $_GET["CvePregunta"];
	
	$query = obtenEvaluaciones($Mes,$Anio,$AcumuladoFiltro,$CveAsistencia,$CveServicio,$CvePregunta,$CveOrigen);

// DB table to use
$table = $query;

// Table's primary key
$primaryKey = 'CveEvaluacion';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(
	array( 'db' => 'CveEvaluacion', 'dt' => 0 ),
	array( 'db' => 'Nombre',  'dt' => 1 ),
	array( 'db' => 'ApellidoPaterno',   'dt' => 2 ),
	array( 'db' => 'ApellidoMaterno',     'dt' => 3 ),
	array( 'db' => 'Correo',     'dt' => 4 ),
	array( 'db' => 'NUMERO_CUENTA',     'dt' => 5 ),
	array( 'db' => 'Telefono',     'dt' => 6 ),
	array( 'db' => 'Estado',     'dt' => 7 ),
	array( 'db' => 'Asistencia',     'dt' => 8 ),
	array( 'db' => 'CveServicio',     'dt' => 9 ),
	array( 'db' => 'Servicio',     'dt' => 10 ),
	array( 'db' => 'FechaEvaluacion',     'dt' => 11 ),
	array( 'db' => 'P1',     'dt' => 12 ),
	array( 'db' => 'P2',     'dt' => 13 ),
	array( 'db' => 'P3',     'dt' => 14 ),
	array( 'db' => 'P4',     'dt' => 15 ),
	array( 'db' => 'P5',     'dt' => 16 ),
	array( 'db' => 'P6',     'dt' => 17 ),
	array( 'db' => 'P7',     'dt' => 18 ),
	array( 'db' => 'P8',     'dt' => 19 ),
	array( 'db' => 'P9',     'dt' => 20 ),
	array( 'db' => 'Clas1',     'dt' => 21 ),
	array( 'db' => 'Clas2',     'dt' => 22 ),
	array( 'db' => 'CveOrigen',     'dt' => 23 ),
	array( 'db' => 'CveAsistencia',     'dt' => 24 ),
	array( 'db' => 'NPS',     'dt' => 25 ),
	array( 'db' => 'Audio',     'dt' => 26 )
);

// SQL server connection information

//include('../../../conf/config.php');

$sql_details['host'] = "internal-db.s148218.gridserver.com";
$sql_details['db'] = "db148218_pif";
$sql_details['user'] = "db148218";
$sql_details['pass'] = "Mockup2015-";


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


