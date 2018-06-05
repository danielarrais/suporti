-- Criação da View e uso do Join
-- A view CHAMADOS_FULL retorna todos os chamados, com os dados necessários para exibição em listagem ou única
CREATE OR REPLACE VIEW chamados_full AS SELECT DISTINCT
  ch.id_chamado, ch.descricao, ch.motivo_rejeicao, ch.horario_abertura, ch.horario_fechamento,
  niu.id_nivel_urgencia as id_urgencia, niu.urgencia,
  st.id_status, st.status,
  us.id as id_user, us.name as nome_user, us.sobrenome as sobrenome_user,
  at.id as id_atendente, at.name as nome_atendente, at.sobrenome as sobrenome_atendente,
  pr.id_print, pr.nome as nome_print, pr.url as url_print
FROM chamados ch
INNER JOIN users us ON ch.id_usuario = us.id
INNER JOIN users at ON ch.id_atendente = at.id or ch.id_atendente isnull
INNER JOIN nivel_urgencia niu ON ch.id_nivel_urgencia = niu.id_nivel_urgencia
INNER JOIN status_atendimento st ON ch.id_status = st.id_status
INNER JOIN prints pr ON ch.id_print = pr.id_print or ch.id_print isnull;
