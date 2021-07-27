CREATE OR REPLACE VIEW public.vjournal_single_format
AS SELECT v.tanggal_transaksi,
    v.code,
    v.keterangan,
        CASE
            WHEN v.number = 1 AND v.typdebet::text = 'activa'::text THEN v.amount
            WHEN v.number = 1 AND v.typdebet::text = 'pasiva'::text THEN - v.amount
            WHEN v.number = 2 AND v.typkredit::text = 'activa'::text THEN - v.amount
            WHEN v.number = 2 AND v.typkredit::text = 'pasiva'::text THEN v.amount
            ELSE 0::double precision
        END AS debet,
    v.header_journals_id,
    v.nama_status AS status_name
   FROM vjournal v;