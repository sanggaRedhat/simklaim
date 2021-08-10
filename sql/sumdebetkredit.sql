CREATE OR REPLACE VIEW public.vsumdebetkredit
AS SELECT sum(j.debet) AS debet,
    sum(j.kredit) AS kredit,
    header_journals_id 
   FROM journals j
  GROUP BY j.header_journals_id;