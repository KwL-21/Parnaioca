create database parnaioca;

Use parnaioca;

create table funcionarios(
    matricula int(11) primary key auto_increment,
    login varchar(50) unique,
    cpf varchar(14) unique,
    email varchar(50),
    senha varchar(32),
    perfil enum('a','u')
);


create table clientes(
    idcliente int(11) auto_increment,
    cpf varchar(14) unique,
    nome varchar(40),
    nascimento date,
    email varchar(40),
    telefone varchar(20) unique,
    estado char(2),
    cidade varchar(40),
    situacao enum('a','Ii')
)

create table Acomodacoes(
    idacomodacoes int(11) primary key auto_increment,
    nome varchar(40),
    valor_acomodação decimal(10,2), 
    capacidade int(11),
    tipoAcomodacoes enum('s','a') 
)

INSERT INTO acomodacoes values(null, 'Suite_Parnaioca', '1000.00', '6','s');
INSERT INTO acomodacoes values(null, 'Suite_Lagoa_azul', '1000.00', '5','s');
INSERT INTO acomodacoes values(null, 'Suite_Lopes_Mendes', '1000.00', '4','Ss');
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

create table estoque(
    idestoque int(11) primary key auto_increment,
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
    dataaquisicap date,
    status char(1),
    capacidade int(11),
    acomodacao varchar(40)
)

create table consumidos(
    id int (11),
    idacomodacoes int (11),
    idreserva int (11),
    idcheckin int (11),
    idestoque int (11),
    idfrigobar int (11),
    quantidade int (11),
    valor decimal (10,2),
    data date
)

create table estoque_frigobar(
    id int primary key auto_increment,
    idfrigobar int(11),
    idestoque int(11),
    quantidade int(11)
)

create table checkin(
    idcheckin int primary key auto_increment,
    idReserva int(11) (fk),
    hospedes int(11),
    forma de pagamento varchar(40)
)

create table checkout(
    idcheckout int(11) primary key auto_increment,
    idReserva int(11) (fk),
    consumototal decimal(10,2),
    totalpago decimal (10,2)
)

create table estacionamento(
    idestacionamento int(11) primary key auto_increment,
    idreserva int(11),
    vagas int(11),
    cliente int(11),
    placa char(6)
)