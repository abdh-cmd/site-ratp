drop database if exists ratp_284 ; 
create database ratp_284; 
use ratp_284; 

create table ligne (
	idligne int(3) not null auto_increment, 
	description text,  
	stationDebut varchar(50), 
	stationFin varchar (50), 
	nbStations int, 
	primary key(idligne)
);

create table bus (
	idbus int(3) not null auto_increment, 
	matricule varchar(20), 
	marque varchar(50), 
	capacite int (3), 
	energie varchar(50), 
	primary key (idbus)
);

create table chauffeur (
	idchauffeur int(3) not null auto_increment, 
	nom varchar(20), 
	prenom varchar(50), 
	email varchar(50),
	mdp varchar(50), 
	adresse varchar(50),
	role enum("chauffeur", "admin"), 
	primary key (idchauffeur)
); 

create table affectation (
	idaffectation int(3) not null auto_increment,
	dateaffectation date, 
	description text, 
	idligne int (3) not null, 
	idbus int (3) not null,
	idchauffeur int (3) not null,
	primary key (idaffectation), 
	foreign key (idligne) references ligne(idligne), 
	foreign key (idbus) references bus(idbus), 
	foreign key (idchauffeur) references chauffeur(idchauffeur)	
);
