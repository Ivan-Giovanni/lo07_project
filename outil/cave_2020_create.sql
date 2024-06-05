-- table banques

create table if not exists banque (
    id integer unsigned not null,
    label varchar(50) unique not null,
    pays varchar(30) not null,
    primary key (id)
    ) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- table personne

create table if not exists personne (
    id integer unsigned not null,
    nom varchar(40) not null,
    prenom varchar(40) unique not null,
    statut integer unsigned not null,
    login varchar(20) not null,
    password varchar(20) not null,
    primary key (id)
    ) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- table des comptes

create table if not exists compte (
    id integer unsigned not null,
    label varchar(40) not null,
    montant float not null,
    banque_id integer unsigned not null,
    personne_id integer unsigned not null,
    primary key (id),
    foreign key (banque_id) references banque(id),
    foreign key (personne_id) references personne(id)
    ) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


-- table des immo

create table if not exists residence (
    id integer unsigned not null,
    label varchar(100) not null,
    ville varchar(50) not null,
    prix float not null,
    personne_id integer unsigned not null,
    primary key (id),
    foreign key (personne_id) references personne(id)
    ) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;