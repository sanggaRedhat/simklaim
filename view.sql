CREATE OR REPLACE VIEW public.vjournal
AS SELECT row_number() OVER (ORDER BY j.id) AS "group",
    j.id,
    unnest(ARRAY[1, 2]) AS number,
    j.tanggal_transaksi,
    j.keterangan,
    unnest(ARRAY[j.debet, j.kredit]) AS amount,
    unnest(ARRAY[c.code, c2.code]) AS code,
    j.header_journals_id
   FROM journals j
     JOIN codes c ON c.id = j.debet_code_id
     JOIN codes c2 ON c2.id = j.kredit_code_id;