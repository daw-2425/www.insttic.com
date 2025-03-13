CREATE DATABASE insttic;
use insttic;
DROP DATABASE IF EXISTS insttic;

--noticia
CREATE TABLE noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255),
    titulo VARCHAR(255),
    descripcion TEXT
);
insert into noticias (imagen,titulo,descripcion)
    VALUES
('card3.jpeg','Entrevista al director del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC):Retos y Desafíos de la Educación',
' Segun la entrevista realizada el sabado, 1 de febrero al Director del Instituto Sergio en la ciudad de Oyala. El "INSTTIC ha sido su desafio mas grande a nivel educacional".Los desafíos son diversos. Desde la adaptación a nuevas metodologías de enseñanza, hasta el uso de la tecnología en el aula y la gestión de la convivencia entre los estudiantes. También es crucial fomentar la motivación y el bienestar del alumnado. Desde la adaptación a nuevas metodologías de enseñanza.'
),
('card2.png','Preparativos para el aniversario del INSTTIC',
' Cada 23 de febrero se celebra el aniversario del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC) ese dia fue cuando se dio a conocer al instituto. Ya van más de 2 generaciones, cientos de estudiantes formados desde su grata presencia'),
('cadr1.jpg','Visita de la PNUD en el instituto',
'Antes de culminar el mes el Programa de las Naciones Unidas para el Desarrollo (PNUD) hizo una visita al Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC). Con el fin de darse a conocer entre los jovenes. La PNUD desde siempre ha hecho esa visita en el pais con la corazonada de cambiar la forma de pensar de los jovenes.       La PNUD desde siempre ha hecho esa visita en el pais con la corazonada de cambiar la forma de pensar de los jovenes. El PNUD es una red mundial que trabaja en más de 170 países y territorios. Su objetivo es ayudar a los países a alcanzar los Objetivos de Desarrollo Sostenible, reduciendo la pobreza y las desigualdades, y promoviendo el cambio climático.');
insert into noticias (imagen,titulo,descripcion)
    VALUES
('mar.webp','La ciudad de Oyala organiza una maraton para los estudiantes por el 12 de octubre','El presidente de Oyala tuvo la idea de organizar una maraton por el dia de la Independencia del pais. La PNUD desde siempre ha hecho esa visita en el pais con la corazonada de cambiar la forma de pensar de los jovenes.') ;   

--contenido_noticia
CREATE TABLE contenido_noticia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto LONGTEXT NOT NULL,
    imagen_secundaria VARCHAR(255) NOT NULL,
    texto_dos LONGTEXT NOT NULL, -- Segunda imagen (exclusiva de `contenido_pagina`)
    fecha VARCHAR(50)NOT NULL
    
);
ALTER TABLE contenido_noticia ADD id_noticia int;
ALTER TABLE contenido_noticia ADD FOREIGN KEY (id_noticia) REFERENCES noticias(id);

INSERT INTO contenido_noticia (id_noticia, texto, fecha,imagen_secundaria,texto_dos)
VALUES (1, 
' Por el presente aniversario la empresa CONEXXIA ofreció una charla sobre la fibra óptica y los beneficios que emplea. También es crucial fomentar la motivación y el bienestar del alumnado.Los desafíos son diversos. Desde la adaptación a nuevas metodologías de enseñanza, hasta el uso de la tecnología en el aula y la gestión de la convivencia entre los estudiantes. También es crucial fomentar la motivación y el bienestar del alumnado. Desde la adaptación a nuevas metodologías de enseñanza, hasta el uso de la tecnología en el aula y la gestión de la convivencia entre los estudiantes. También es crucial fomentar la motivación y el bienestar del alumnado. Hablando de la tecnologia y su integracion en el aprendizaje afirma que el y con la colaboracion del  Ministro de Transportes, Correos y Nuevas Tecnologías de Información y Comunicación Honorato Evita Oma ,han implementado plataformas digitales, aulas virtuales y herramientas interactivas para facilitar el aprendizaje. También capacitan a los docentes en el uso de nuevas tecnologías para que puedan aprovecharlas al máximo. Explica que el instituto esta enfocado en mejorar la infraestructura, aumentar la oferta de actividades extracurriculares y fortalecer el vínculo entre la comunidad educativa y el instituto.  El director del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC) antes de culminar la entrevista animo a los estudiantes de esta generacion y las proximas a que aprovechen todas las oportunidades de aprendizaje y que trabajemos juntos para construir un ambiente positivo y enriquecedor para todos.'
                                    , 'Lunes, 2025-03-12','director2.jpeg',
                                    'Al finalizar el Director del Instituto Superior de Telecomunicaciones hablo ante todos sobre la importancia de la mujer en la tecnología y el gran valor que aportan en el mundo como sociedad crecedora. Las aconsejo a no tener complejos ante otros hombres y mujeres diciendo: "Una mujer no solo debe saber estudiar sino debe tener la capacidad de saber resaltarse en cualquier parte con educación y altivez." '
                                    );


INSERT INTO contenido_noticia (id_noticia, texto, fecha,imagen_secundaria,texto_dos)
VALUES (2,'Hablando de la tecnologia y su integracion en el aprendizaje afirma que el y con la colaboracion del  Ministro de Transportes, Correos y Nuevas Tecnologías de Información y Comunicación Honorato Evita Oma ,han implementado plataformas digitales, aulas virtuales y herramientas interactivas para facilitar el aprendizaje. También capacitan a los docentes en el uso de nuevas tecnologías para que puedan aprovecharlas al máximo. Explica que el instituto esta enfocado en mejorar la infraestructura, aumentar la oferta de actividades extracurriculares y fortalecer el vínculo entre la comunidad educativa y el instituto.',
                                    'Jueves, 2025-04-10','tecno2.jfif','                                    El presidente en su entrevista por el aniversario del INSTTIC dijo: Gracias a la tecnología, continuó el miembro del Gobierno, las empresas se hacen más eficientes ayudando a la creación de nuevas oportunidades de empleo, por eso, insistió que la tecnología debe identificarse como un factor clave para el desarrollo y la diversificación, porque es fundamental en cualquier desarrollo económico, ya sea en el sector primario, como en el sector secundario, con la transformación productiva y el sector de servicios.
                                    Según S. E. Obiang Nguema Mbasogo, el Instituto Superior de Telecomunicaciones, se ha creado para la formación intelectual y profesional porque hoy en día, estas materias están presentes en todos los sectores, y la nueva vida administrativa política y económica se basan en las nuevas tecnologías por eso dijo, "tenemos que formar a nuestros jóvenes si queremos alcanzar el nivel de otros países”.'
                                    );
INSERT INTO contenido_noticia (id_noticia, texto, fecha,imagen_secundaria,texto_dos)
VALUES
(3,'En segundo lugar, trabaja con los asociados sobre las interacciones entre gobernanza, derechos humanos y respuestas sanitarias. La clave de las soluciones para un desarrollo eficaz se encuentra en establecer una estrategia de salud basada en los derechos humanos, que se centre en reducir la desigualdad y en alcanzar a los más excluidos de la sociedad. El PNUD impulsa la respuesta al VIH prestando especial atención al papel que desempeñan los marcos legales. De este modo, trabaja con los gobiernos, la sociedad civil y los asociados de las Naciones Unidas para cumplir las recomendaciones de la Comisión Global sobre VIH y el Derecho, así como la legislación vigente en distintos ámbitos: criminalización; igualdad de género y capacitación de la mujer; derechos de los trabajadores sexuales, de los hombres que tienen relaciones sexuales con hombres, de las personas que consumen drogas y de las personas transgénero; y acceso al tratamiento.','Martes, 2025-04-15','masnot2.jpg',
'Por otra parte, más allá de estas acciones concretas, el PNUD desempeña un papel fundamental a la hora de asegurar la atención al VIH y a la salud a través de iniciativas más amplias en materia de gobernanza y derechos. Algunas de estas serían, por ejemplo, reforzar la gobernanza local y las capacidades nacionales para asegurar que las personas afectadas por el VIH disfruten de un acceso más equitativo a los servicios; consolidar el estado de derecho; o reformar los sistemas legales con el fin de reaccionar ante la discriminación contra las personas afectadas por el VIH.');

SELECT * FROM noticias;