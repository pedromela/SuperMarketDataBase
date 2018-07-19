insert into categoria values ('Gelados');
insert into categoria values ('Congelados');
insert into categoria values ('Sumos');
insert into categoria values ('Vinhos');
insert into categoria values ('Bebidas');
insert into categoria values ('Legumes');
insert into categoria values ('Carnes');
insert into categoria values ('Frutas');
insert into categoria values ('Citrinos');
insert into categoria values ('Couves');
insert into categoria values ('Brancas');
insert into categoria values ('Vermelhas');

insert into categoria_simples values ('Vinhos');
insert into categoria_simples values ('Sumos');
insert into categoria_simples values ('Gelados');
insert into categoria_simples values ('Couves');
insert into categoria_simples values ('Citrinos');
insert into categoria_simples values ('Brancas');
insert into categoria_simples values ('Vermelhas');

insert into super_categoria values ('Congelados');
insert into super_categoria values ('Bebidas');
insert into super_categoria values ('Legumes');
insert into super_categoria values ('Carnes');
insert into super_categoria values ('Frutas');

insert into constituida values ('Legumes', 'Couves');
insert into constituida values ('Bebidas', 'Vinhos');
insert into constituida values ('Bebidas', 'Sumos');
insert into constituida values ('Frutas', 'Citrinos');
insert into constituida values ('Congelados', 'Gelados');
insert into constituida values ('Carnes', 'Brancas');
insert into constituida values ('Carnes', 'Vermelhas');

insert into fornecedor values ('123456780', 'Azeiteiro');
insert into fornecedor values ('123456781', 'Eduardo');
insert into fornecedor values ('000000003', 'Manuel');
insert into fornecedor values ('000000004', 'Maria');
insert into fornecedor values ('000000005', 'Pedro');
insert into fornecedor values ('000000006', 'Frederico');
insert into fornecedor values ('000000007', 'Francisco');
insert into fornecedor values ('000000008', 'Joao');
insert into fornecedor values ('000000009', 'Joaquim');
insert into fornecedor values ('000000010', 'Silvia');
insert into fornecedor values ('000000011', 'Mariana');
insert into fornecedor values ('000000012', 'Jose');

insert into produto values ('1234567890121', 'Limao', 'Citrinos', '123456780', '2017-10-18');
insert into produto values ('1234567890122', 'Laranja', 'Citrinos', '123456780', '2017-10-18');
insert into produto values ('1234567890123', 'Vaca', 'Vermelhas', '123456780', '2017-10-18');
insert into produto values ('1234567890124', 'Frango', 'Brancas', '123456780', '2017-10-18');
insert into produto values ('1234567890125', 'Couve Flor', 'Couves', '123456780', '2017-10-17');
insert into produto values ('1234567890126', 'Alface', 'Legumes', '123456780', '2017-10-17');
insert into produto values ('1234567890127', 'Pepino', 'Legumes', '123456780', '2017-10-17');
insert into produto values ('1234567890128', 'Salsa', 'Legumes', '123456780', '2017-10-17');
insert into produto values ('1234567890129', 'Coentros', 'Legumes', '123456780', '2017-10-17');

insert into fornece_sec values ('123456781', '1234567890122');
insert into fornece_sec values ('000000003', '1234567890122');
insert into fornece_sec values ('000000004', '1234567890122');
insert into fornece_sec values ('000000005', '1234567890122');
insert into fornece_sec values ('000000006', '1234567890122');
insert into fornece_sec values ('000000007', '1234567890122');
insert into fornece_sec values ('000000008', '1234567890122');
insert into fornece_sec values ('000000009', '1234567890122');
insert into fornece_sec values ('000000010', '1234567890122');
insert into fornece_sec values ('000000011', '1234567890122');
insert into fornece_sec values ('000000012', '1234567890122');

insert into fornece_sec values ('123456781', '1234567890121');
insert into fornece_sec values ('000000003', '1234567890121');
insert into fornece_sec values ('000000004', '1234567890121');
insert into fornece_sec values ('000000005', '1234567890121');
insert into fornece_sec values ('000000006', '1234567890121');
insert into fornece_sec values ('000000007', '1234567890121');
insert into fornece_sec values ('000000008', '1234567890121');
insert into fornece_sec values ('000000009', '1234567890121');
insert into fornece_sec values ('000000010', '1234567890121');
insert into fornece_sec values ('000000011', '1234567890121');
insert into fornece_sec values ('000000012', '1234567890121');


insert into corredor values ('1','10');
insert into corredor values ('2','10');
insert into corredor values ('3','10');
insert into corredor values ('4','10');
insert into corredor values ('5','15');
insert into corredor values ('6','15');
insert into corredor values ('7','15');
insert into corredor values ('8','15');


insert into prateleira values ('1', 'direito', 'chao');
insert into prateleira values ('1', 'direito', 'medio');
insert into prateleira values ('1', 'direito', 'superior');
insert into prateleira values ('1', 'esquerdo', 'chao');
insert into prateleira values ('1', 'esquerdo', 'medio');
insert into prateleira values ('1', 'esquerdo', 'superior');

insert into prateleira values ('2', 'direito', 'chao');
insert into prateleira values ('2', 'direito', 'medio');
insert into prateleira values ('2', 'direito', 'superior');
insert into prateleira values ('2', 'esquerdo', 'chao');
insert into prateleira values ('2', 'esquerdo', 'medio');
insert into prateleira values ('2', 'esquerdo', 'superior');

insert into prateleira values ('3', 'direito', 'chao');
insert into prateleira values ('3', 'direito', 'medio');
insert into prateleira values ('3', 'direito', 'superior');
insert into prateleira values ('3', 'esquerdo', 'chao');
insert into prateleira values ('3', 'esquerdo', 'medio');
insert into prateleira values ('3', 'esquerdo', 'superior');

insert into prateleira values ('4', 'direito', 'chao');
insert into prateleira values ('4', 'direito', 'medio');
insert into prateleira values ('4', 'direito', 'superior');
insert into prateleira values ('4', 'esquerdo', 'chao');
insert into prateleira values ('4', 'esquerdo', 'medio');
insert into prateleira values ('4', 'esquerdo', 'superior');

insert into prateleira values ('5', 'direito', 'chao');
insert into prateleira values ('5', 'direito', 'medio');
insert into prateleira values ('5', 'direito', 'superior');
insert into prateleira values ('5', 'esquerdo', 'chao');
insert into prateleira values ('5', 'esquerdo', 'medio');
insert into prateleira values ('5', 'esquerdo', 'superior');

insert into prateleira values ('6', 'direito', 'chao');
insert into prateleira values ('6', 'direito', 'medio');
insert into prateleira values ('6', 'direito', 'superior');
insert into prateleira values ('6', 'esquerdo', 'chao');
insert into prateleira values ('6', 'esquerdo', 'medio');
insert into prateleira values ('6', 'esquerdo', 'superior');

insert into prateleira values ('7', 'direito', 'chao');
insert into prateleira values ('7', 'direito', 'medio');
insert into prateleira values ('7', 'direito', 'superior');
insert into prateleira values ('7', 'esquerdo', 'chao');
insert into prateleira values ('7', 'esquerdo', 'medio');
insert into prateleira values ('7', 'esquerdo', 'superior');

insert into planograma values ('1234567890121', '1', 'esquerdo', 'superior', '20', '200');
insert into planograma values ('1234567890122', '2', 'esquerdo', 'superior', '10', '200');
insert into planograma values ('1234567890123', '3', 'esquerdo', 'superior', '10', '100');
insert into planograma values ('1234567890123', '4', 'esquerdo', 'superior', '10', '100');
insert into planograma values ('1234567890121', '5', 'esquerdo', 'superior', '10', '100');
insert into planograma values ('1234567890124', '6', 'esquerdo', 'superior', '10', '100');
insert into planograma values ('1234567890121', '7', 'esquerdo', 'superior', '10', '100');

insert into planograma values ('1234567890122', '1', 'esquerdo', 'medio', '10', '200');
insert into planograma values ('1234567890123', '2', 'esquerdo', 'superior', '10', '200');

insert into evento_reposicao values('Manuel Joaquim', '2017-10-19 10:23:54');
insert into evento_reposicao values('Joaquim Inacio', '2017-10-19 09:23:54');
insert into evento_reposicao values('Manuel Joaquim', '2017-10-19 10:33:54');
insert into evento_reposicao values('Joaquim Inacio', '2017-10-19 09:33:54');
insert into evento_reposicao values('Manuel Joaquim', '2017-10-19 10:43:54');
insert into evento_reposicao values('Joaquim Inacio', '2017-10-19 09:43:54');

insert into reposicao values ('1234567890121', '1', 'esquerdo', 'superior', 'Manuel Joaquim', '2017-10-19 10:23:54',10);
insert into reposicao values ('1234567890121', '1', 'esquerdo', 'superior', 'Joaquim Inacio', '2017-10-19 09:23:54',10);

insert into reposicao values ('1234567890122', '1', 'esquerdo', 'medio', 'Manuel Joaquim', '2017-10-19 10:33:54',10);
insert into reposicao values ('1234567890122', '1', 'esquerdo', 'medio', 'Joaquim Inacio', '2017-10-19 09:33:54',10);

insert into reposicao values ('1234567890123', '2', 'esquerdo', 'superior', 'Manuel Joaquim', '2017-10-19 10:43:54',10);
insert into reposicao values ('1234567890123', '2', 'esquerdo', 'superior', 'Joaquim Inacio', '2017-10-19 09:43:54',10);
