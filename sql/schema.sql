drop table reposicao cascade;
drop table evento_reposicao cascade;
drop table planograma cascade;
drop table prateleira cascade;
drop table corredor cascade;
drop table fornece_sec cascade;
drop table produto cascade;
drop table fornecedor cascade;
drop table constituida cascade;
drop table super_categoria cascade;
drop table categoria_simples cascade;
drop table categoria cascade;

create table categoria(
	nome	varchar(80) not null unique,
	constraint pk_categoria primary key(nome)
);

create table categoria_simples(
	nome varchar(80) not null unique,
	constraint pk_categoria_simples primary key(nome),
    constraint fk_categoria_simples_categoria foreign key(nome) references categoria(nome) ON DELETE CASCADE
);

create table super_categoria(
	nome varchar(80) not null unique,
	constraint pk_super_categoria primary key(nome),
    constraint fk_super_categoria_categoria foreign key(nome) references categoria(nome) ON DELETE CASCADE
);

create table constituida(
	super_categoria varchar(80) not null,
	categoria varchar(80) not null,
	constraint pk_constituida primary key(super_categoria, categoria),
    constraint fk_constituida_super_categoria foreign key(super_categoria) references super_categoria(nome) ON DELETE CASCADE,
    constraint fk_constituida_categoria foreign key(categoria) references categoria(nome) ON DELETE CASCADE
);
	
create table fornecedor(
	nif	char(9) not null unique,
	nome	varchar(80) not null,
	constraint pk_fornecedor primary key(nif)
);
	
create table produto(
	ean char(13) not null unique,
	design	varchar(255) not null,
	categoria	varchar(80) not null,
	forn_primario	varchar(80) not null,
	data_produto	date not null,
	constraint pk_produto primary key(ean),
    constraint fk_produto_categoria foreign key(categoria) references categoria(nome) ON DELETE CASCADE,
    constraint fk_produto_fornecedor foreign key(forn_primario) references fornecedor(nif) ON DELETE CASCADE
);

create table fornece_sec(
	nif char(9) not null,
	ean char(13) not null,
	constraint pk_fornece_sec primary key(nif, ean),
    constraint fk_fornece_sec_fornecedor foreign key(nif) references fornecedor(nif) ON DELETE CASCADE,
    constraint fk_fornece_sec_produto foreign key(ean) references produto(ean) ON DELETE CASCADE	
);

create table corredor(
	nro	numeric(10, 0) not null unique,
	largura	numeric(10, 0) not null,
	constraint pk_corredor primary key(nro)
);

create table prateleira(
	nro	numeric(10, 0) not null,
	lado	varchar(8) not null,
	altura	varchar(8) not null,
	constraint pk_prateleira primary key(nro, lado, altura),
    constraint fk_prateleira_corredor foreign key(nro) references corredor(nro) ON DELETE CASCADE
);

create table planograma(
	ean	char(13) not null,
	nro	numeric(10, 0) not null,
	lado	varchar(8) not null,
	altura	varchar(8) not null,
	face 	int not null,
	unidades	int not null,
	loc		SERIAL,
	constraint pk_planograma primary key(ean, nro, lado, altura),
    constraint fk_planograma_produto foreign key(ean) references produto(ean) ON DELETE CASCADE,
    constraint fk_planograma_prateleira foreign key(nro, lado, altura) references prateleira(nro, lado , altura) ON DELETE CASCADE
);

create table evento_reposicao(
	operador varchar(80) not null,
	instante timestamp not null,
	constraint pk_evento_reposicao primary key(operador, instante)
);

create table reposicao(
	ean	char(13) not null,
	nro	numeric(10, 0) not null,
	lado	varchar(8) not null,
	altura	varchar(8) not null,
	operador varchar(80) not null,
	instante timestamp not null,
	unidades int not null,
	constraint pk_reposicao primary key(ean, nro, lado, altura, operador, instante),
    constraint fk_reposicao_planograma foreign key(ean, nro, lado, altura) references planograma(ean, nro, lado , altura) ON DELETE CASCADE,
    constraint fk_reposicao_evento_reposicao foreign key(operador, instante) references evento_reposicao(operador, instante) ON DELETE CASCADE
);