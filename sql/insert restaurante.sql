INSERT INTO `wp_app_categorias` (`id`, `nombre`, `visibilidad`) VALUES
(1, 'DESAYUNO', 1),
(2, 'MENU', 1),
(3, 'EXTRAS', 1),
(4, 'JUGOS', 1),
(5, 'CENA', 1);

INSERT INTO `wp_app_articulos` (`id`, `nombre`, `precio`, `descripcion`, `foto`, `disponibilidad`, `categoria_id`) VALUES
(1, 'LOMO SALTADO', '9.99', NULL, NULL, 1, 1),
(2, 'SALTADO DE POLLO', '9.99', NULL, NULL, 1, 1),
(3, 'BISTEC MONTADO', '10.99', NULL, NULL, 1, 1),
(4, 'POLLO A LA PLANCHA', '8.99', NULL, NULL, 1, 1),
(5, 'TALLARIN SALTADO DE POLLO', '11.99', NULL, NULL, 1, 1),
(6, 'TALLARIN SALTADO DE CARNE', '11.99', NULL, NULL, 1, 1),
(7, 'POLLO AL VAPOR', '9.99', NULL, NULL, 1, 1),
(8, 'ARROZ A LA CUBANA', '8.99', NULL, NULL, 1, 1),
(9, 'AJI DE GALLINA', '8.99', NULL, NULL, 1, 2),
(10, 'REVUELTO DE PATITAS', '8.99', NULL, NULL, 1, 2),
(11, 'ARROZ A LA JARDINERA CON CHULETA DE CERDO', '8.99', NULL, NULL, 1, 2),
(12, 'JUGO DE PAPAYA', '4.99', NULL, NULL, 1, 4),
(13, 'JUGO DE FRESA CON LECHE', '6.99', NULL, NULL, 1, 4),
(14, 'CHANCHITO AL HORNO CON TAMAL', '24.99', NULL, NULL, 1, 3),
(15, 'BISTEC A LO POBRE', '26.99', NULL, NULL, 1, 3),
(16, 'CUY CHACTADO', '29.99', NULL, NULL, 1, 3),
(17, 'MERIENDA CUSQUEÑA', '35.99', NULL, NULL, 1, 3),
(18, 'SARZA DE PATITA', '19.99', NULL, NULL, 1, 3);

INSERT INTO `wp_app_tipo_empleado` (`id`, `role`) VALUES
(1, 'Camarero'),
(2, 'Administrador');

INSERT INTO `wp_app_empleado` (`id`, `name`, `email`, `password`, `remember_token`, `tipo_empleado_id`) VALUES
(1, 'Juancho Tacorta', 'juanchotacorta@gmail.com', 'Juancho@@2024', NULL, 1),
(2, 'Perico los Palotes', 'pericolospalotes@gmail.com', 'Perico@@2024', NULL, 2);

INSERT INTO `wp_app_etiquetas` (`id`, `type`) VALUES
(1, 'Atendido'),
(2, 'Atendiendo'),
(3, 'Espera');

INSERT INTO `wp_app_forma_pago` (`id`, `type`) VALUES
(1, 'EFECTIVO'),
(2, 'DEPOSITO'),
(3, 'PLIN'),
(4, 'TARJETA'),
(5, 'YAPE');

INSERT INTO `wp_app_llevas` (`id`, `cliente`, `telefono`, `fecha_llevas`, `hora_llevas`) VALUES
(1, 'FERRETERIA LUIS', NULL, '2023-01-27 17:09:25', '17:18:50'),
(2, 'DIPROSEG', NULL, '2023-01-27 17:10:08', '13:00:00'),
(3, 'SOLUCION', NULL, '2023-01-27 17:10:25', '13:00:00'),
(4, 'NIÑA', NULL, '2023-01-27 17:10:08', '13:00:00'),
(5, 'SISAQ SUR', NULL, '2023-01-27 17:10:08', '13:00:00');

INSERT INTO `wp_app_mesas` (`id`, `numero_mesa`, `numero_clientes`) VALUES
(1, 1, 5),
(2, 2, 12),
(3, 13, 2),
(4, 17, NULL),
(5, 19, NULL),
(6, 21, NULL),
(7, 26, 10),
(8, 3, 5),
(9, 4, 3),
(10, 6, 7);

INSERT INTO `wp_app_recoges` (`id`, `cliente`, `telefono`, `direccion`, `hora_recoges`) VALUES
(1, 'GORE PATRICIA', NULL, '', null),
(2, 'GORE SABI', NULL, '', null),
(3, 'GORE ELENA', NULL, '', null),
(4, 'TC ABAJO', NULL, 'Urb los alamos F4', null);

INSERT INTO `wp_app_tipo_pedidos` (`id`, `type`) VALUES
(1, 'Mesa'),
(2, 'Llevar'),
(3, 'Recoger');

INSERT INTO `wp_app_pedidos` (`id`, `tipo_pedido_id`, `empleado_id`, `etiqueta_id`) VALUES
(1, 2, 1,1),
(2, 1, 2,1),
(3, 1, 1,1),
(4, 3, 1,3),
(5, 1, 2,3),
(6, 2, 1,2),
(7, 2, 2,2);

