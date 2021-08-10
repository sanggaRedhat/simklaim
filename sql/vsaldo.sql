CREATE OR REPLACE VIEW public.vsaldo
AS SELECT vsf.code,
    sum(vsf.debet) AS amount,
    vsf.header_journals_id,
    vsf.code_name,
    (select sum(amount) from vsaldo_final where vsaldo_final.code=vsf.code) as saldo_akhir
   FROM vjournal_single_format vsf
  GROUP BY vsf.code, vsf.header_journals_id, vsf.code_name ;