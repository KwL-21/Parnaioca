create database parnaioca;

Use parnaioca;

create table funcionarios(
    matricula int(11) primary key auto_increment,
    login varchar(50) unique,
    cpf varchar(14) unique,
    email varchar(50),
    senha varchar(32),
    perfil enum('a','u')
)


create table clientes(
    idcliente int(11) auto_increment,
    cpf varchar(14) unique,
    nome varchar(40),
    nascimento date,
    email varchar(40),
    telefone varchar(20) unique,
    estado char(2),
    cidade varchar(40),
    situacao enum('a','i')
)

create table Acomodacoes(
    idacomodacoes int(11) primary key auto_increment,
    nome varchar(40),
    valor decimal(10,2), 
    capacidade int(11),
    tipo enum('s','a'), 
    status enum ('a','i')
)

INSERT INTO acomodacoes values(null, 'Suite_Parnaioca', '1000.00', '6','s');
INSERT INTO acomodacoes values(null, 'Suite_Lagoa_azul', '1000.00', '5','s');
INSERT INTO acomodacoes values(null, 'Suite_Lopes_Mendes', '1000.00', '4','S');
INSERT INTO acomodacoes values(null, 'Apartamento_1', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_2', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_3', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_4', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_5', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_6', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_7', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_8', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_9', '500.00', '2','a');
INSERT INTO acomodacoes values(null, 'Apartamento_10', '500.00', '2','a');

create table reserva(
    idreserva int primary key auto_increment,
    Acomodacoes varchar(40), (FK)
    inicio date,
    final date,
    situacao enum('reservado','ocupado','concluido','cancelado'),
    cliente varchar(45) (FK)
)

create table produtos(
    idproduto int(11) primary key auto_increment,
    nome varchar(40),
    valorunitario decimal(10,2),
    valorpagounitario decimal(10,2),
    entradas int(11),
    saidas int(11),
    estoque int(11),
    marca varchar(40),
    ultimacompra datetime
)

create table frigobar(
    id int primary key auto_increment,
    nome varchar(40),
    dataaquisicao date,
    status char(1),
    capacidade int(11),
    acomodacao varchar(40)
)

create table consumidos(
    id int (11) primary key auto_increment,
    idacomodacoes int (11),
    idreserva int (11),
    idcheckin int (11),
    idestoque int (11),
    idfrigobar int (11),
    quantidade int (11),
    valor decimal (10,2),
    data date
)V

create table estoque_frigobar(
    id int primary key auto_increment,
    idfrigobar int(11),
    idprodutos int(11),
    quantidade int(11)
)

create table checkin(
    idcheckin int primary key auto_increment,
    idReserva int(11) (fk),
    hospedes int(11),
    pagamento varchar(40)
)V

create table checkout(
    idcheckout int(11) primary key auto_increment,
    idReserva int(11) (fk),
    consumo decimal(10,2),
    totalapagar decimal (10,2),
    situacao ENUM ('p''q')
)

create table estacionamento(
    idestacionamento int(11) primary key auto_increment,
    idreserva int(11),
    vagas int(11),
    cliente int(11),
    placa char(6)
)