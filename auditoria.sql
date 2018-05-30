CREATE OR REPLACE FUNCTION auditRegister() RETURNS TRIGGER LANGUAGE plpgsql AS $$
BEGIN
        IF (TG_OP = 'DELETE') THEN
            INSERT INTO suporti.public.auditoria SELECT nextval('auditoria_id_auditoria_seq'::regclass), TG_OP, concatresultcolum(tg_table_name, OLD.*::text), tg_table_name, now();
            RETURN OLD;
        ELSIF (TG_OP = 'UPDATE') THEN
            INSERT INTO suporti.public.auditoria SELECT nextval('auditoria_id_auditoria_seq'::regclass), TG_OP, concatresultcolum(tg_table_name, OLD.*::text), tg_table_name, now();
            RETURN NEW;
        ELSIF (TG_OP = 'INSERT') THEN
            INSERT INTO suporti.public.auditoria SELECT nextval('auditoria_id_auditoria_seq'::regclass), TG_OP, concatresultcolum(tg_table_name, OLD.*::text), tg_table_name, now();
            RETURN NEW;
        END IF;
        RETURN NULL; -- result is ignored since this is an AFTER trigger
    END;
$$;

CREATE OR REPLACE FUNCTION concatResultColum(text, text) RETURNS text LANGUAGE plpgsql AS $$
DECLARE
    texto varchar ='';
    cols text[] = array(SELECT column_name::text FROM information_schema.columns WHERE table_schema = 'public' AND table_name  = $1);
    result text[] = string_to_array(replace(replace(($2), '(', ''), ')', ''), ',');
    x varchar;
    i int = 1;
BEGIN
  FOREACH x IN ARRAY result
  LOOP
    texto = concat(texto, cols[i], ': ', x);
    i = i+1;
    IF i <= array_length(result, 1) THEN
      texto = concat(texto, ', ');
    end if;
  END LOOP;
  RETURN texto;
END;
$$;

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.funcao
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.users
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.avaliacoes
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.categorias
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.chamados
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.niveis
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.nivel_urgencia
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.prints
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.setores
    FOR EACH ROW EXECUTE PROCEDURE auditregister();

CREATE TRIGGER auditRegister
AFTER INSERT OR UPDATE OR DELETE ON suporti.public.status_atendimento
    FOR EACH ROW EXECUTE PROCEDURE auditregister();