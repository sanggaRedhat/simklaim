PGDMP                          y            simkeu    12.2    12.2 ?    3           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            4           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            5           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            6           1262    382790    simkeu    DATABASE     d   CREATE DATABASE simkeu WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'C' LC_CTYPE = 'C';
    DROP DATABASE simkeu;
                postgres    false            ?            1259    391816    banks    TABLE       CREATE TABLE public.banks (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    code_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.banks;
       public         heap    postgres    false            ?            1259    391814    banks_id_seq    SEQUENCE     u   CREATE SEQUENCE public.banks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.banks_id_seq;
       public          postgres    false    222            7           0    0    banks_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.banks_id_seq OWNED BY public.banks.id;
          public          postgres    false    221            ?            1259    391732    codes    TABLE     y  CREATE TABLE public.codes (
    id bigint NOT NULL,
    code character varying(255) NOT NULL,
    keterangan character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    set character varying(255),
    color character varying(255),
    group_code_id bigint,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.codes;
       public         heap    postgres    false            ?            1259    391730    codes_id_seq    SEQUENCE     u   CREATE SEQUENCE public.codes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.codes_id_seq;
       public          postgres    false    210            8           0    0    codes_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.codes_id_seq OWNED BY public.codes.id;
          public          postgres    false    209            ?            1259    391718    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            ?            1259    391716    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    208            9           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    207            ?            1259    391858    final_saldos    TABLE       CREATE TABLE public.final_saldos (
    id bigint NOT NULL,
    code_id bigint NOT NULL,
    debet double precision,
    kredit double precision,
    end_date date,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
     DROP TABLE public.final_saldos;
       public         heap    postgres    false            ?            1259    391856    final_saldos_id_seq    SEQUENCE     |   CREATE SEQUENCE public.final_saldos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.final_saldos_id_seq;
       public          postgres    false    228            :           0    0    final_saldos_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.final_saldos_id_seq OWNED BY public.final_saldos.id;
          public          postgres    false    227            ?            1259    399670    group_codes    TABLE     ?   CREATE TABLE public.group_codes (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.group_codes;
       public         heap    postgres    false            ?            1259    399668    group_codes_id_seq    SEQUENCE     {   CREATE SEQUENCE public.group_codes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.group_codes_id_seq;
       public          postgres    false    240            ;           0    0    group_codes_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.group_codes_id_seq OWNED BY public.group_codes.id;
          public          postgres    false    239            ?            1259    391743    header_journals    TABLE     E  CREATE TABLE public.header_journals (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    keterangan character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    status_header_id bigint,
    month_preiode date,
    month_periode date
);
 #   DROP TABLE public.header_journals;
       public         heap    postgres    false            ?            1259    391741    header_journals_id_seq    SEQUENCE        CREATE SEQUENCE public.header_journals_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.header_journals_id_seq;
       public          postgres    false    212            <           0    0    header_journals_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.header_journals_id_seq OWNED BY public.header_journals.id;
          public          postgres    false    211            ?            1259    391754    journals    TABLE     ?  CREATE TABLE public.journals (
    id bigint NOT NULL,
    header_journals_id bigint NOT NULL,
    debet double precision NOT NULL,
    kredit double precision NOT NULL,
    keterangan character varying(255) NOT NULL,
    tanggal_transaksi date NOT NULL,
    debet_code_id bigint NOT NULL,
    kredit_code_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    linking bigint
);
    DROP TABLE public.journals;
       public         heap    postgres    false            ?            1259    391752    journals_id_seq    SEQUENCE     x   CREATE SEQUENCE public.journals_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.journals_id_seq;
       public          postgres    false    214            =           0    0    journals_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.journals_id_seq OWNED BY public.journals.id;
          public          postgres    false    213            ?            1259    391690 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            ?            1259    391688    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    203            >           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    202            ?            1259    391803    otoriz_firsts    TABLE     #  CREATE TABLE public.otoriz_firsts (
    id bigint NOT NULL,
    header_journals_id bigint NOT NULL,
    keterangan character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public.otoriz_firsts;
       public         heap    postgres    false            ?            1259    391801    otoriz_firsts_id_seq    SEQUENCE     }   CREATE SEQUENCE public.otoriz_firsts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.otoriz_firsts_id_seq;
       public          postgres    false    220            ?           0    0    otoriz_firsts_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.otoriz_firsts_id_seq OWNED BY public.otoriz_firsts.id;
          public          postgres    false    219            ?            1259    391709    password_resets    TABLE     ?   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            ?            1259    391840 	   role_user    TABLE     ?   CREATE TABLE public.role_user (
    id bigint NOT NULL,
    role_id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.role_user;
       public         heap    postgres    false            ?            1259    391838    role_user_id_seq    SEQUENCE     y   CREATE SEQUENCE public.role_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.role_user_id_seq;
       public          postgres    false    226            @           0    0    role_user_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.role_user_id_seq OWNED BY public.role_user.id;
          public          postgres    false    225            ?            1259    391832    roles    TABLE     ?   CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.roles;
       public         heap    postgres    false            ?            1259    391830    roles_id_seq    SEQUENCE     u   CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public          postgres    false    224            A           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public          postgres    false    223            ?            1259    391790    saldos    TABLE     ?   CREATE TABLE public.saldos (
    id bigint NOT NULL,
    code_id bigint NOT NULL,
    tahun integer NOT NULL,
    mount double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.saldos;
       public         heap    postgres    false            ?            1259    391788    saldos_id_seq    SEQUENCE     v   CREATE SEQUENCE public.saldos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.saldos_id_seq;
       public          postgres    false    218            B           0    0    saldos_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.saldos_id_seq OWNED BY public.saldos.id;
          public          postgres    false    217            ?            1259    391777    status_headers    TABLE     ?   CREATE TABLE public.status_headers (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 "   DROP TABLE public.status_headers;
       public         heap    postgres    false            ?            1259    391775    status_headers_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.status_headers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.status_headers_id_seq;
       public          postgres    false    216            C           0    0    status_headers_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.status_headers_id_seq OWNED BY public.status_headers.id;
          public          postgres    false    215            ?            1259    399654    transaction_types    TABLE     ?   CREATE TABLE public.transaction_types (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 %   DROP TABLE public.transaction_types;
       public         heap    postgres    false            ?            1259    399652    transaction_types_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.transaction_types_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.transaction_types_id_seq;
       public          postgres    false    238            D           0    0    transaction_types_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.transaction_types_id_seq OWNED BY public.transaction_types.id;
          public          postgres    false    237            ?            1259    391698    users    TABLE     ?  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    two_factor_secret text,
    two_factor_recovery_codes text,
    nik character varying(255)
);
    DROP TABLE public.users;
       public         heap    postgres    false            ?            1259    391696    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    205            E           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    204            ?            1259    399636    validation_finances    TABLE     ?   CREATE TABLE public.validation_finances (
    id bigint NOT NULL,
    header_journal_id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 '   DROP TABLE public.validation_finances;
       public         heap    postgres    false            ?            1259    399634    validation_finances_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.validation_finances_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.validation_finances_id_seq;
       public          postgres    false    236            F           0    0    validation_finances_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.validation_finances_id_seq OWNED BY public.validation_finances.id;
          public          postgres    false    235            ?            1259    399344    vjournal    VIEW     ?  CREATE VIEW public.vjournal AS
 SELECT row_number() OVER (ORDER BY j.id) AS "group",
    j.id,
    unnest(ARRAY[1, 2]) AS number,
    j.tanggal_transaksi,
    j.keterangan,
    unnest(ARRAY[j.debet, j.kredit]) AS amount,
    unnest(ARRAY[c.code, c2.code]) AS code,
    j.header_journals_id,
    c.set AS typdebet,
    c2.set AS typkredit,
    sh.nama AS nama_status
   FROM ((((public.journals j
     JOIN public.codes c ON ((c.id = j.debet_code_id)))
     JOIN public.codes c2 ON ((c2.id = j.kredit_code_id)))
     JOIN public.header_journals hj ON ((hj.id = j.header_journals_id)))
     JOIN public.status_headers sh ON ((sh.id = hj.status_header_id)));
    DROP VIEW public.vjournal;
       public          postgres    false    210    212    212    214    214    214    214    214    214    214    214    216    216    210    210            ?            1259    399353    vjournal_single_format    VIEW     ?  CREATE VIEW public.vjournal_single_format AS
 SELECT v.tanggal_transaksi,
    v.code,
    v.keterangan,
        CASE
            WHEN ((v.number = 1) AND ((v.typdebet)::text = 'activa'::text)) THEN v.amount
            WHEN ((v.number = 1) AND ((v.typdebet)::text = 'pasiva'::text)) THEN (- v.amount)
            WHEN ((v.number = 2) AND ((v.typkredit)::text = 'activa'::text)) THEN (- v.amount)
            WHEN ((v.number = 2) AND ((v.typkredit)::text = 'pasiva'::text)) THEN v.amount
            ELSE (0)::double precision
        END AS debet,
    v.header_journals_id,
    v.nama_status AS status_name,
    ( SELECT codes.keterangan
           FROM public.codes
          WHERE ((codes.code)::text = (v.code)::text)) AS code_name
   FROM public.vjournal v;
 )   DROP VIEW public.vjournal_single_format;
       public          postgres    false    210    229    229    229    229    229    210    229    229    229    229            ?            1259    399349    vjurnal_format    VIEW     ?  CREATE VIEW public.vjurnal_format AS
 SELECT v.tanggal_transaksi,
    v.code,
    v.keterangan,
        CASE
            WHEN (v.number = 1) THEN v.amount
            WHEN (v.number = 1) THEN v.amount
            ELSE (0)::double precision
        END AS debet,
        CASE
            WHEN (v.number = 2) THEN v.amount
            WHEN (v.number = 2) THEN (- v.amount)
            ELSE (0)::double precision
        END AS kredit,
    v.header_journals_id
   FROM public.vjournal v;
 !   DROP VIEW public.vjurnal_format;
       public          postgres    false    229    229    229    229    229    229            ?            1259    399358    vsaldo_final    VIEW     ?   CREATE VIEW public.vsaldo_final AS
 SELECT vsf.code,
    sum(vsf.debet) AS amount,
    vsf.header_journals_id
   FROM public.vjournal_single_format vsf
  WHERE ((vsf.status_name)::text = 'released'::text)
  GROUP BY vsf.code, vsf.header_journals_id;
    DROP VIEW public.vsaldo_final;
       public          postgres    false    231    231    231    231            ?            1259    399626    vsaldo    VIEW     ?  CREATE VIEW public.vsaldo AS
 SELECT vsf.code,
    sum(vsf.debet) AS amount,
    vsf.header_journals_id,
    vsf.code_name,
    ( SELECT sum(vsaldo_final.amount) AS sum
           FROM public.vsaldo_final
          WHERE ((vsaldo_final.code)::text = (vsf.code)::text)) AS saldo_akhir
   FROM public.vjournal_single_format vsf
  GROUP BY vsf.code, vsf.header_journals_id, vsf.code_name;
    DROP VIEW public.vsaldo;
       public          postgres    false    231    232    232    231    231    231            ?            1259    399687 
   vsaldo_all    VIEW     
  CREATE VIEW public.vsaldo_all AS
 SELECT codes.id,
    codes.code,
    codes.keterangan,
    codes.created_at,
    codes.updated_at,
    codes.set,
    codes.color,
    codes.group_code_id,
    codes.deleted_at,
    group_codes.name,
    ( SELECT sum(vsaldo_final.amount) AS sum
           FROM public.vsaldo_final
          WHERE ((vsaldo_final.code)::text = (codes.code)::text)) AS saldo
   FROM (public.codes
     JOIN public.group_codes ON ((group_codes.id = codes.group_code_id)))
  WHERE (codes.deleted_at IS NULL);
    DROP VIEW public.vsaldo_all;
       public          postgres    false    210    210    210    210    210    210    210    210    210    232    232    240    240            ?            1259    399676    vsaldo_bank    VIEW     <  CREATE VIEW public.vsaldo_bank AS
 SELECT vsf.code,
    sum(vsf.debet) AS amount,
    ( SELECT banks.name
           FROM (public.banks
             JOIN public.codes ON ((codes.id = banks.code_id)))
          WHERE ((codes.code)::text = (vsf.code)::text)) AS name,
    ( SELECT codes.color
           FROM public.codes
          WHERE ((codes.code)::text = (vsf.code)::text)) AS color,
    ( SELECT codes.keterangan
           FROM public.codes
          WHERE ((codes.code)::text = (vsf.code)::text)) AS code_name,
    ( SELECT gc.name
           FROM (public.codes
             JOIN public.group_codes gc ON ((gc.id = codes.group_code_id)))
          WHERE ((codes.code)::text = (vsf.code)::text)) AS "group"
   FROM public.vjournal_single_format vsf
  WHERE ((vsf.status_name)::text = 'released'::text)
  GROUP BY vsf.code;
    DROP VIEW public.vsaldo_bank;
       public          postgres    false    210    222    231    231    222    240    231    240    210    210    210    210            ?            1259    399692 
   vsaldo_ijp    VIEW     M  CREATE VIEW public.vsaldo_ijp AS
 SELECT date_trunc('month'::text, (vsf.tanggal_transaksi)::timestamp with time zone) AS mon,
    sum(vsf.debet) AS amount
   FROM public.vjournal_single_format vsf
  WHERE ((vsf.code)::text = '1100001'::text)
  GROUP BY (date_trunc('month'::text, (vsf.tanggal_transaksi)::timestamp with time zone));
    DROP VIEW public.vsaldo_ijp;
       public          postgres    false    231    231    231            ?            1259    399630    vsumdebetkredit    VIEW     ?   CREATE VIEW public.vsumdebetkredit AS
 SELECT sum(j.debet) AS debet,
    sum(j.kredit) AS kredit,
    j.header_journals_id
   FROM public.journals j
  GROUP BY j.header_journals_id;
 "   DROP VIEW public.vsumdebetkredit;
       public          postgres    false    214    214    214            P           2604    391819    banks id    DEFAULT     d   ALTER TABLE ONLY public.banks ALTER COLUMN id SET DEFAULT nextval('public.banks_id_seq'::regclass);
 7   ALTER TABLE public.banks ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    222    222            J           2604    391735    codes id    DEFAULT     d   ALTER TABLE ONLY public.codes ALTER COLUMN id SET DEFAULT nextval('public.codes_id_seq'::regclass);
 7   ALTER TABLE public.codes ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209    210            H           2604    391721    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    208    207    208            S           2604    391861    final_saldos id    DEFAULT     r   ALTER TABLE ONLY public.final_saldos ALTER COLUMN id SET DEFAULT nextval('public.final_saldos_id_seq'::regclass);
 >   ALTER TABLE public.final_saldos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    227    228            V           2604    399673    group_codes id    DEFAULT     p   ALTER TABLE ONLY public.group_codes ALTER COLUMN id SET DEFAULT nextval('public.group_codes_id_seq'::regclass);
 =   ALTER TABLE public.group_codes ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    240    239    240            K           2604    391746    header_journals id    DEFAULT     x   ALTER TABLE ONLY public.header_journals ALTER COLUMN id SET DEFAULT nextval('public.header_journals_id_seq'::regclass);
 A   ALTER TABLE public.header_journals ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    211    212            L           2604    391757    journals id    DEFAULT     j   ALTER TABLE ONLY public.journals ALTER COLUMN id SET DEFAULT nextval('public.journals_id_seq'::regclass);
 :   ALTER TABLE public.journals ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    214    214            F           2604    391693    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202    203            O           2604    391806    otoriz_firsts id    DEFAULT     t   ALTER TABLE ONLY public.otoriz_firsts ALTER COLUMN id SET DEFAULT nextval('public.otoriz_firsts_id_seq'::regclass);
 ?   ALTER TABLE public.otoriz_firsts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    220    220            R           2604    391843    role_user id    DEFAULT     l   ALTER TABLE ONLY public.role_user ALTER COLUMN id SET DEFAULT nextval('public.role_user_id_seq'::regclass);
 ;   ALTER TABLE public.role_user ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    226    226            Q           2604    391835    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    224    224            N           2604    391793 	   saldos id    DEFAULT     f   ALTER TABLE ONLY public.saldos ALTER COLUMN id SET DEFAULT nextval('public.saldos_id_seq'::regclass);
 8   ALTER TABLE public.saldos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            M           2604    391780    status_headers id    DEFAULT     v   ALTER TABLE ONLY public.status_headers ALTER COLUMN id SET DEFAULT nextval('public.status_headers_id_seq'::regclass);
 @   ALTER TABLE public.status_headers ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            U           2604    399657    transaction_types id    DEFAULT     |   ALTER TABLE ONLY public.transaction_types ALTER COLUMN id SET DEFAULT nextval('public.transaction_types_id_seq'::regclass);
 C   ALTER TABLE public.transaction_types ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    238    237    238            G           2604    391701    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204    205            T           2604    399639    validation_finances id    DEFAULT     ?   ALTER TABLE ONLY public.validation_finances ALTER COLUMN id SET DEFAULT nextval('public.validation_finances_id_seq'::regclass);
 E   ALTER TABLE public.validation_finances ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    235    236    236            $          0    391816    banks 
   TABLE DATA           S   COPY public.banks (id, name, address, code_id, created_at, updated_at) FROM stdin;
    public          postgres    false    222   ??                 0    391732    codes 
   TABLE DATA           t   COPY public.codes (id, code, keterangan, created_at, updated_at, set, color, group_code_id, deleted_at) FROM stdin;
    public          postgres    false    210   e?                 0    391718    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    208   e?       *          0    391858    final_saldos 
   TABLE DATA           d   COPY public.final_saldos (id, code_id, debet, kredit, end_date, created_at, updated_at) FROM stdin;
    public          postgres    false    228   ??       0          0    399670    group_codes 
   TABLE DATA           G   COPY public.group_codes (id, name, created_at, updated_at) FROM stdin;
    public          postgres    false    240   ??                 0    391743    header_journals 
   TABLE DATA           ?   COPY public.header_journals (id, nama, keterangan, created_at, updated_at, status_header_id, month_preiode, month_periode) FROM stdin;
    public          postgres    false    212   ּ                 0    391754    journals 
   TABLE DATA           ?   COPY public.journals (id, header_journals_id, debet, kredit, keterangan, tanggal_transaksi, debet_code_id, kredit_code_id, created_at, updated_at, linking) FROM stdin;
    public          postgres    false    214   ?                 0    391690 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    203   ??       "          0    391803    otoriz_firsts 
   TABLE DATA           o   COPY public.otoriz_firsts (id, header_journals_id, keterangan, deleted_at, created_at, updated_at) FROM stdin;
    public          postgres    false    220   ~?                 0    391709    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    206   ??       (          0    391840 	   role_user 
   TABLE DATA           Q   COPY public.role_user (id, role_id, user_id, created_at, updated_at) FROM stdin;
    public          postgres    false    226   ??       &          0    391832    roles 
   TABLE DATA           A   COPY public.roles (id, name, created_at, updated_at) FROM stdin;
    public          postgres    false    224   ??                  0    391790    saldos 
   TABLE DATA           S   COPY public.saldos (id, code_id, tahun, mount, created_at, updated_at) FROM stdin;
    public          postgres    false    218   V?                 0    391777    status_headers 
   TABLE DATA           J   COPY public.status_headers (id, nama, created_at, updated_at) FROM stdin;
    public          postgres    false    216   s?       .          0    399654    transaction_types 
   TABLE DATA           M   COPY public.transaction_types (id, name, created_at, updated_at) FROM stdin;
    public          postgres    false    238   ??                 0    391698    users 
   TABLE DATA           ?   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, two_factor_secret, two_factor_recovery_codes, nik) FROM stdin;
    public          postgres    false    205   ??       ,          0    399636    validation_finances 
   TABLE DATA           e   COPY public.validation_finances (id, header_journal_id, user_id, created_at, updated_at) FROM stdin;
    public          postgres    false    236   A?       G           0    0    banks_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.banks_id_seq', 5, true);
          public          postgres    false    221            H           0    0    codes_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.codes_id_seq', 7, true);
          public          postgres    false    209            I           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    207            J           0    0    final_saldos_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.final_saldos_id_seq', 1, false);
          public          postgres    false    227            K           0    0    group_codes_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.group_codes_id_seq', 2, true);
          public          postgres    false    239            L           0    0    header_journals_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.header_journals_id_seq', 10, true);
          public          postgres    false    211            M           0    0    journals_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.journals_id_seq', 15, true);
          public          postgres    false    213            N           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 42, true);
          public          postgres    false    202            O           0    0    otoriz_firsts_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.otoriz_firsts_id_seq', 1, false);
          public          postgres    false    219            P           0    0    role_user_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.role_user_id_seq', 35, true);
          public          postgres    false    225            Q           0    0    roles_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.roles_id_seq', 34, true);
          public          postgres    false    223            R           0    0    saldos_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.saldos_id_seq', 1, false);
          public          postgres    false    217            S           0    0    status_headers_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.status_headers_id_seq', 33, true);
          public          postgres    false    215            T           0    0    transaction_types_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.transaction_types_id_seq', 1, false);
          public          postgres    false    237            U           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 33, true);
          public          postgres    false    204            V           0    0    validation_finances_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.validation_finances_id_seq', 8, true);
          public          postgres    false    235            o           2606    391824    banks banks_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.banks
    ADD CONSTRAINT banks_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.banks DROP CONSTRAINT banks_pkey;
       public            postgres    false    222            c           2606    391740    codes codes_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.codes
    ADD CONSTRAINT codes_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.codes DROP CONSTRAINT codes_pkey;
       public            postgres    false    210            _           2606    391727    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    208            a           2606    391729 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    208            u           2606    391863    final_saldos final_saldos_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.final_saldos
    ADD CONSTRAINT final_saldos_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.final_saldos DROP CONSTRAINT final_saldos_pkey;
       public            postgres    false    228            {           2606    399675    group_codes group_codes_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.group_codes
    ADD CONSTRAINT group_codes_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.group_codes DROP CONSTRAINT group_codes_pkey;
       public            postgres    false    240            e           2606    391751 $   header_journals header_journals_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.header_journals
    ADD CONSTRAINT header_journals_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.header_journals DROP CONSTRAINT header_journals_pkey;
       public            postgres    false    212            g           2606    391759    journals journals_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.journals
    ADD CONSTRAINT journals_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.journals DROP CONSTRAINT journals_pkey;
       public            postgres    false    214            X           2606    391695    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    203            m           2606    391808     otoriz_firsts otoriz_firsts_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.otoriz_firsts
    ADD CONSTRAINT otoriz_firsts_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.otoriz_firsts DROP CONSTRAINT otoriz_firsts_pkey;
       public            postgres    false    220            s           2606    391845    role_user role_user_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.role_user DROP CONSTRAINT role_user_pkey;
       public            postgres    false    226            q           2606    391837    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public            postgres    false    224            k           2606    391795    saldos saldos_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.saldos
    ADD CONSTRAINT saldos_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.saldos DROP CONSTRAINT saldos_pkey;
       public            postgres    false    218            i           2606    391782 "   status_headers status_headers_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.status_headers
    ADD CONSTRAINT status_headers_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.status_headers DROP CONSTRAINT status_headers_pkey;
       public            postgres    false    216            y           2606    399659 (   transaction_types transaction_types_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.transaction_types
    ADD CONSTRAINT transaction_types_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.transaction_types DROP CONSTRAINT transaction_types_pkey;
       public            postgres    false    238            Z           2606    391708    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    205            \           2606    391706    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    205            w           2606    399641 ,   validation_finances validation_finances_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.validation_finances
    ADD CONSTRAINT validation_finances_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.validation_finances DROP CONSTRAINT validation_finances_pkey;
       public            postgres    false    236            ]           1259    391715    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    206            ?           2606    391825    banks banks_code_id_foreign    FK CONSTRAINT     z   ALTER TABLE ONLY public.banks
    ADD CONSTRAINT banks_code_id_foreign FOREIGN KEY (code_id) REFERENCES public.codes(id);
 E   ALTER TABLE ONLY public.banks DROP CONSTRAINT banks_code_id_foreign;
       public          postgres    false    222    3171    210            |           2606    399681 !   codes codes_group_code_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.codes
    ADD CONSTRAINT codes_group_code_id_foreign FOREIGN KEY (group_code_id) REFERENCES public.group_codes(id);
 K   ALTER TABLE ONLY public.codes DROP CONSTRAINT codes_group_code_id_foreign;
       public          postgres    false    3195    210    240            ?           2606    391864 )   final_saldos final_saldos_code_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.final_saldos
    ADD CONSTRAINT final_saldos_code_id_foreign FOREIGN KEY (code_id) REFERENCES public.codes(id);
 S   ALTER TABLE ONLY public.final_saldos DROP CONSTRAINT final_saldos_code_id_foreign;
       public          postgres    false    228    3171    210            }           2606    391783 8   header_journals header_journals_status_header_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.header_journals
    ADD CONSTRAINT header_journals_status_header_id_foreign FOREIGN KEY (status_header_id) REFERENCES public.status_headers(id) ON DELETE CASCADE;
 b   ALTER TABLE ONLY public.header_journals DROP CONSTRAINT header_journals_status_header_id_foreign;
       public          postgres    false    3177    212    216                       2606    391765 '   journals journals_debet_code_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.journals
    ADD CONSTRAINT journals_debet_code_id_foreign FOREIGN KEY (debet_code_id) REFERENCES public.codes(id);
 Q   ALTER TABLE ONLY public.journals DROP CONSTRAINT journals_debet_code_id_foreign;
       public          postgres    false    214    3171    210            ~           2606    391760 ,   journals journals_header_journals_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.journals
    ADD CONSTRAINT journals_header_journals_id_foreign FOREIGN KEY (header_journals_id) REFERENCES public.header_journals(id);
 V   ALTER TABLE ONLY public.journals DROP CONSTRAINT journals_header_journals_id_foreign;
       public          postgres    false    3173    214    212            ?           2606    391770 (   journals journals_kredit_code_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.journals
    ADD CONSTRAINT journals_kredit_code_id_foreign FOREIGN KEY (kredit_code_id) REFERENCES public.codes(id);
 R   ALTER TABLE ONLY public.journals DROP CONSTRAINT journals_kredit_code_id_foreign;
       public          postgres    false    214    210    3171            ?           2606    391809 6   otoriz_firsts otoriz_firsts_header_journals_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.otoriz_firsts
    ADD CONSTRAINT otoriz_firsts_header_journals_id_foreign FOREIGN KEY (header_journals_id) REFERENCES public.header_journals(id);
 `   ALTER TABLE ONLY public.otoriz_firsts DROP CONSTRAINT otoriz_firsts_header_journals_id_foreign;
       public          postgres    false    220    212    3173            ?           2606    391846 #   role_user role_user_role_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.role_user DROP CONSTRAINT role_user_role_id_foreign;
       public          postgres    false    224    226    3185            ?           2606    391851 #   role_user role_user_user_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.role_user DROP CONSTRAINT role_user_user_id_foreign;
       public          postgres    false    226    3164    205            ?           2606    391796    saldos saldos_code_id_foreign    FK CONSTRAINT     |   ALTER TABLE ONLY public.saldos
    ADD CONSTRAINT saldos_code_id_foreign FOREIGN KEY (code_id) REFERENCES public.codes(id);
 G   ALTER TABLE ONLY public.saldos DROP CONSTRAINT saldos_code_id_foreign;
       public          postgres    false    218    210    3171            ?           2606    399642 A   validation_finances validation_finances_header_journal_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.validation_finances
    ADD CONSTRAINT validation_finances_header_journal_id_foreign FOREIGN KEY (header_journal_id) REFERENCES public.header_journals(id) ON DELETE CASCADE;
 k   ALTER TABLE ONLY public.validation_finances DROP CONSTRAINT validation_finances_header_journal_id_foreign;
       public          postgres    false    212    236    3173            ?           2606    399647 7   validation_finances validation_finances_user_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.validation_finances
    ADD CONSTRAINT validation_finances_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 a   ALTER TABLE ONLY public.validation_finances DROP CONSTRAINT validation_finances_user_id_foreign;
       public          postgres    false    205    236    3164            $   ?   x?????0???S? 0?n?'QC޸Ԅ??(	n1???????]?}_C??>?H??!?RW?-B???!????!/v>??????*Q^8???eU??:f??????_N??O1?h?G]??r?tV?&A?[1:R??8??F?????I?,Fk?z????T??8Ps3Y?R?7?ff
         ?   x?m?1k?0?g?Whl?1??lG/m?xh?,?`\[????4???CHǽ{@???٨?M????0?H쿂?tq????(0Z6M???S?;????~:N??o?牲6Q?Ề`7ю??[:?C?????_????U`?0???L0I=??7k??RZWw?"d??仓????y??*m+?^?= ???0e?#`??s܁??f???q?O???b?q???-9l??????ta            x?????? ? ?      *      x?????? ? ?      0   '   x?3?tJ?????".#΀Լ?܂Ҽ??<?X? ??	?           x????J?0??ӧ??2?kڹ[?+dQ?ۛC)?m???oo?5?qB??;sfb?nj??y?އ?>?L?wvm?V???S7??O?????\_w/$?(ǂ???/??&r?HZ?VWЛ5??4?? ?????E@Ch	?+^E????t?S.?3?r幚<Z˟\?닛?7_e? )KʤZA&?^?{??C;!?/rBAҤ?$?#?w-<???5Ϯg|?_ ??2:?,?22ʙ񷰍?N5??V?@?H?DC???0??ob?H?j???f.??,?> ͮ??         ?  x????n?0E??W??f????@?nٸjD????Q???8??e3pq???\#C&??\???~???/_?܇?a??|A2????:?O:/0??`??ğE.??r`???fs???@??*??0?6???Ŏ????u`?5ab#Dfv{?5?????P:i?RI???9>???|'???t???xV2EGSD??m??????rя?g??~ƛ O?eR??HVޙҿ?M}??/i 'ut7?<Gٱ??@-?.|>?G???$?D|??Y??԰d??}?T?????nV???.?)-???S??郂6?E? ?˖SNm_???!?uX9???)T?M?km?????Qx??pTNM??X?;P??7ۗ!;??̜DG@?B'eR?h=??:?G?D?? ?|;˲?P??,         ?  x?m?ᒜ ??!?}??0??=??? ?M????*??q???%!	?&8H܂??>?O??`?R??]??L?A8???WLަ?Ci
??T???|E{s}???q??&R?)?\܋??.?C??????xm?"\??]ͦ???}????Tj߃?!Q?9Mnl???l??????U?????+s~ei??dH.k?^85?T9??D?P\?q??b?#/8-?֖?F[ ?,G???c??s?_???F??6?T???6?????p@X????;R5?)`?c?ۖ,\׸??B^ֈ)????>??fO֐?6-?Ft
??????z4?T?u?Bn?????2ĩ?S??%??)?0ح^In?tA??y?-?,z??=q*???@???? Csp? ?-.]B????H&y#?eng????8\??I8?Q<??`;??A3)??u?|C	5?????ˠn?      "      x?????? ? ?            x?????? ? ?      (   !   x?3?4?? ?26?4FpL9?|/F??? ???      &   ]   x?3?LL??????".#΢????????"??1D?,1'3%?$3?/>-3/1/9*o?!_RTZ\?5?????eVaJ?aJ??n5U4F??? ?=i             x?????? ? ?         0   x?3?L)JL+???".#΂Լ?̼t(ߘ?(5'5?85*???? ?5?      .      x?????? ? ?         a   x?3?LL??̃?`R/9??3ƏSŨR??@%?ѹ??????ť?"ԧ?4ˣ?S/(?8߻?8%(?׼?? ????????\???'???q??qqq ?? ?      ,   t   x?m???0D?3S?HcC-鿎u?+???4!%!e???%ޔ?4;WJ?ԫjxm??WF~??D?H?͏?dM???i?z5??3-??Iq?h??H????W~??>2??????B?     