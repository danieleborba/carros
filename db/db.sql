create database carrocidente;
use carrocidente;

create table pessoa(
	cpf varchar(14) primary key,
	rg varchar (9),
	endereco varchar (45),
	telefone varchar(15),
	nome varchar (45)
);

create table carro(
	placa varchar(8) primary key,
	fabricante varchar(45),
	modelo varchar(45),
	ano int,
	cpf_pessoa varchar(45),
	foreign key (cpf_pessoa) references pessoa(cpf)
);

create table ocorrencia(
	codigo int primary key auto_increment,
	data_ocorrencia date,
	local_ocorrencia varchar(45),
	descricao varchar(400),
	placa_carro varchar(8),
	foreign key (placa_carro) references carro(placa)
);