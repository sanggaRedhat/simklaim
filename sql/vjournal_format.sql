CREATE OR REPLACE VIEW public.vjurnal_format
AS SELECT v.tanggal_transaksi,
    v.code,
    v.keterangan,
        CASE
            WHEN v.number = 1 THEN v.amount
            WHEN v.number = 1 THEN v.amount
            ELSE 0::double precision
        END AS debet,
        CASE
            WHEN v.number = 2 THEN v.amount
            WHEN v.number = 2 THEN - v.amount
            ELSE 0::double precision
        END AS kredit,
    v.header_journals_id
   FROM vjournal v;