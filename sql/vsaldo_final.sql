CREATE OR REPLACE VIEW public.vsaldo_final
AS SELECT vsf.code,
    sum(vsf.debet) AS amount,
    vsf.header_journals_id
   FROM vjournal_single_format vsf
  WHERE vsf.status_name::text = 'released'::text
  GROUP BY vsf.code, vsf.header_journals_id;