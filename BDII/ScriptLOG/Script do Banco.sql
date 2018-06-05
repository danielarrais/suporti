create table migrations
(
  id        serial       not null,
  migration varchar(255) not null,
  batch     integer      not null,
  constraint migrations_pkey
  primary key (id)
);

create table categorias
(
  id_categoria serial      not null,
  categoria    varchar(45) not null,
  constraint categorias_pkey
  primary key (id_categoria)
);

create table status_atendimento
(
  id_status serial      not null,
  status    varchar(45) not null,
  constraint status_atendimento_pkey
  primary key (id_status)
);

create table avaliacoes
(
  id_avaliacao serial  not null,
  avaliacao    integer not null,
  detalhes     varchar(600),
  constraint avaliacoes_pkey
  primary key (id_avaliacao)
);

create table nivel_urgencia
(
  id_nivel_urgencia serial      not null,
  urgencia          varchar(45) not null,
  constraint nivel_urgencia_pkey
  primary key (id_nivel_urgencia)
);

create table funcao
(
  id_funcao serial       not null,
  funcao    varchar(150) not null,
  constraint funcao_pkey
  primary key (id_funcao)
);

create table niveis
(
  id_nivel serial      not null,
  nivel    varchar(45) not null,
  constraint niveis_pkey
  primary key (id_nivel)
);

create table setores
(
  id_setor serial       not null,
  setor    varchar(100) not null,
  constraint setores_pkey
  primary key (id_setor)
);

create table prints
(
  id_print serial                                       not null,
  url      varchar(300)                                 not null,
  nome     varchar(300) default '' :: character varying not null,
  constraint prints_pkey
  primary key (id_print)
);

create table users
(
  id             serial                not null,
  name           varchar(255)          not null,
  sobrenome      varchar(80)           not null,
  email          varchar(255)          not null,
  password       varchar(255)          not null,
  id_funcao      integer               not null,
  id_setor       integer               not null,
  id_nivel       integer               not null,
  remember_token varchar(100),
  created_at     timestamp(0),
  updated_at     timestamp(0),
  ativo          boolean default true  not null,
  trocar_senha   boolean default false not null,
  constraint users_pkey
  primary key (id),
  constraint users_email_unique
  unique (email),
  constraint users_id_funcao_foreign
  foreign key (id_funcao) references funcao,
  constraint users_id_setor_foreign
  foreign key (id_setor) references setores,
  constraint users_id_nivel_foreign
  foreign key (id_nivel) references niveis
);

create table password_resets
(
  email      varchar(255) not null,
  token      varchar(255) not null,
  created_at timestamp(0)
);

create index password_resets_email_index
  on password_resets (email);

create index password_resets_token_index
  on password_resets (token);

create table chamados
(
  id_chamado         serial            not null,
  titulo             varchar(255)      not null,
  descricao          varchar(600)      not null,
  horario_abertura   timestamp(0)      not null,
  horario_fechamento timestamp(0),
  motivo_rejeicao    varchar(600),
  id_avaliacao       integer,
  id_categoria       integer,
  id_status          integer default 1 not null,
  id_usuario         integer           not null,
  id_atendente       integer,
  id_nivel_urgencia  integer           not null,
  id_print           integer,
  constraint chamados_pkey
  primary key (id_chamado),
  constraint chamados_id_avaliacao_foreign
  foreign key (id_avaliacao) references avaliacoes,
  constraint chamados_id_categoria_foreign
  foreign key (id_categoria) references categorias,
  constraint chamados_id_status_foreign
  foreign key (id_status) references status_atendimento,
  constraint chamados_id_usuario_foreign
  foreign key (id_usuario) references users,
  constraint chamados_id_atendente_foreign
  foreign key (id_atendente) references users,
  constraint chamados_id_nivel_urgencia_foreign
  foreign key (id_nivel_urgencia) references nivel_urgencia,
  constraint chamados_id_print_foreign
  foreign key (id_print) references prints
);

create table auditoria
(
  id_auditoria serial       not null,
  acao         varchar(100) not null,
  descricao    text         not null,
  entidade     varchar(200) not null,
  data_hora    timestamp,
  constraint pk_id_auditoria
  primary key (id_auditoria)
);

