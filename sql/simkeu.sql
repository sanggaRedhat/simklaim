/*
 Navicat Premium Data Transfer

 Source Server         : Postgre Local
 Source Server Type    : PostgreSQL
 Source Server Version : 120002
 Source Host           : localhost:5432
 Source Catalog        : simkeu
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 120002
 File Encoding         : 65001

 Date: 26/08/2021 07:03:47
*/


-- ----------------------------
-- Sequence structure for banks_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."banks_id_seq";
CREATE SEQUENCE "public"."banks_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."banks_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for codes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."codes_id_seq";
CREATE SEQUENCE "public"."codes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."codes_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for failed_jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
CREATE SEQUENCE "public"."failed_jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."failed_jobs_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for final_saldos_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."final_saldos_id_seq";
CREATE SEQUENCE "public"."final_saldos_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."final_saldos_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for group_codes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."group_codes_id_seq";
CREATE SEQUENCE "public"."group_codes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."group_codes_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for header_journals_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."header_journals_id_seq";
CREATE SEQUENCE "public"."header_journals_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."header_journals_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for journals_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."journals_id_seq";
CREATE SEQUENCE "public"."journals_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."journals_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."migrations_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for otoriz_firsts_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."otoriz_firsts_id_seq";
CREATE SEQUENCE "public"."otoriz_firsts_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."otoriz_firsts_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for role_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."role_user_id_seq";
CREATE SEQUENCE "public"."role_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."role_user_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for roles_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."roles_id_seq";
CREATE SEQUENCE "public"."roles_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."roles_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for saldos_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."saldos_id_seq";
CREATE SEQUENCE "public"."saldos_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."saldos_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for status_headers_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."status_headers_id_seq";
CREATE SEQUENCE "public"."status_headers_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."status_headers_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for transaction_types_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."transaction_types_id_seq";
CREATE SEQUENCE "public"."transaction_types_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."transaction_types_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."users_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for validation_finances_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."validation_finances_id_seq";
CREATE SEQUENCE "public"."validation_finances_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."validation_finances_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Table structure for banks
-- ----------------------------
DROP TABLE IF EXISTS "public"."banks";
CREATE TABLE "public"."banks" (
  "id" int8 NOT NULL DEFAULT nextval('banks_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "address" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "code_id" int8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."banks" OWNER TO "postgres";

-- ----------------------------
-- Records of banks
-- ----------------------------
BEGIN;
INSERT INTO "public"."banks" VALUES (1, 'BPD. Kantor Cabang Utama Palangka Raya', 'Jl. RTA. Milono Palangka Raya', 2, NULL, NULL);
INSERT INTO "public"."banks" VALUES (2, 'BPD. Kantor Cabang Pembantu Pasar Kahayan Palangka Raya', 'Jl. RTA. Milono Palangka Raya', 4, NULL, NULL);
INSERT INTO "public"."banks" VALUES (3, 'BPD. Kantor Cabang Pembantu Tangkiling', 'Jl. Cilik Riwut', 6, NULL, NULL);
INSERT INTO "public"."banks" VALUES (5, 'BPD. Kalteng Cabang Kuala Kurun', 'Jl. Linta Kalimantan', 7, '2021-08-19 22:25:02', '2021-08-19 22:25:02');
COMMIT;

-- ----------------------------
-- Table structure for codes
-- ----------------------------
DROP TABLE IF EXISTS "public"."codes";
CREATE TABLE "public"."codes" (
  "id" int8 NOT NULL DEFAULT nextval('codes_id_seq'::regclass),
  "code" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "keterangan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "set" varchar(255) COLLATE "pg_catalog"."default",
  "color" varchar(255) COLLATE "pg_catalog"."default",
  "group_code_id" int8,
  "deleted_at" timestamp(0)
)
;
ALTER TABLE "public"."codes" OWNER TO "postgres";

-- ----------------------------
-- Records of codes
-- ----------------------------
BEGIN;
INSERT INTO "public"."codes" VALUES (1, '1100001', 'IJP Diterima Dimuka', NULL, NULL, 'pasiva', NULL, 2, NULL);
INSERT INTO "public"."codes" VALUES (2, '2100001', 'BPD. Kalteng KCU', NULL, NULL, 'activa', 'rgb(255, 99, 132)', 1, NULL);
INSERT INTO "public"."codes" VALUES (4, '2100002', 'BPD. Kalteng Capem. Pasar Kahayan', NULL, NULL, 'activa', 'rgb(54, 162, 235)', 1, NULL);
INSERT INTO "public"."codes" VALUES (3, '01', 'Dummy', NULL, NULL, 'pasiva', NULL, NULL, '2021-01-01 00:00:00');
INSERT INTO "public"."codes" VALUES (6, '2100003', 'BPD. Kalteng Capem. Tangkiling', '2021-08-19 21:09:48', '2021-08-19 21:09:48', 'activa', 'rgb(47, 241, 170)', 1, NULL);
INSERT INTO "public"."codes" VALUES (7, '2100004', 'BPD. Kalteng Cabang Kuala Kurun', '2021-08-19 21:21:24', '2021-08-19 21:21:24', 'activa', 'rgb(229, 77, 196)', 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."failed_jobs";
CREATE TABLE "public"."failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "uuid" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;
ALTER TABLE "public"."failed_jobs" OWNER TO "postgres";

-- ----------------------------
-- Table structure for final_saldos
-- ----------------------------
DROP TABLE IF EXISTS "public"."final_saldos";
CREATE TABLE "public"."final_saldos" (
  "id" int8 NOT NULL DEFAULT nextval('final_saldos_id_seq'::regclass),
  "code_id" int8 NOT NULL,
  "debet" float8,
  "kredit" float8,
  "end_date" date,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."final_saldos" OWNER TO "postgres";

-- ----------------------------
-- Table structure for group_codes
-- ----------------------------
DROP TABLE IF EXISTS "public"."group_codes";
CREATE TABLE "public"."group_codes" (
  "id" int8 NOT NULL DEFAULT nextval('group_codes_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."group_codes" OWNER TO "postgres";

-- ----------------------------
-- Records of group_codes
-- ----------------------------
BEGIN;
INSERT INTO "public"."group_codes" VALUES (1, 'Bank', NULL, NULL);
INSERT INTO "public"."group_codes" VALUES (2, 'Penampungan', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for header_journals
-- ----------------------------
DROP TABLE IF EXISTS "public"."header_journals";
CREATE TABLE "public"."header_journals" (
  "id" int8 NOT NULL DEFAULT nextval('header_journals_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "keterangan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "status_header_id" int8,
  "month_preiode" date,
  "month_periode" date
)
;
ALTER TABLE "public"."header_journals" OWNER TO "postgres";

-- ----------------------------
-- Records of header_journals
-- ----------------------------
BEGIN;
INSERT INTO "public"."header_journals" VALUES (5, 'Dummy', 'Dummy', NULL, NULL, 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (2, 'Rekening Koran BPD Kalteng KCU', 'Periode 2', '2021-08-04 14:14:43', '2021-08-16 20:42:30', 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (3, 'Rekening Koran BPD. Kalteng KCU Agustus 2021', 'Periode ke 1', '2021-08-10 05:07:06', '2021-08-16 20:42:38', 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (1, 'Rekening Koran Juli 2021', 'Periode ke-4', '2021-07-30 04:05:42', '2021-08-16 20:42:43', 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (6, 'Rekening Koran BPD. Kalteng KCU Agustus 2021', 'Periode ke-1', '2021-08-17 11:37:35', '2021-08-17 11:38:56', 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (7, 'Revisi', 'Agustus 2021', '2021-08-17 16:01:25', '2021-08-17 16:02:24', 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (8, 'Rekon September', '-', '2021-08-18 09:35:54', '2021-08-18 09:37:49', 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (9, 'Rekon BPD. Kalteng KCU Agustus 2021', 'Periode minggu 1', '2021-08-19 10:30:13', '2021-08-19 10:42:32', 3, NULL, NULL);
INSERT INTO "public"."header_journals" VALUES (10, 'Rekening Koran Agustus 2021', 'Periode ke 3', '2021-08-20 09:46:00', '2021-08-20 09:58:59', 3, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for journals
-- ----------------------------
DROP TABLE IF EXISTS "public"."journals";
CREATE TABLE "public"."journals" (
  "id" int8 NOT NULL DEFAULT nextval('journals_id_seq'::regclass),
  "header_journals_id" int8 NOT NULL,
  "debet" float8 NOT NULL,
  "kredit" float8 NOT NULL,
  "keterangan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tanggal_transaksi" date NOT NULL,
  "debet_code_id" int8 NOT NULL,
  "kredit_code_id" int8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "linking" int8
)
;
ALTER TABLE "public"."journals" OWNER TO "postgres";

-- ----------------------------
-- Records of journals
-- ----------------------------
BEGIN;
INSERT INTO "public"."journals" VALUES (1, 1, 2000000, 2000000, 'Pembayaran IJP an. Sangga Daya Anugerah', '2021-06-12', 2, 1, '2021-07-30 04:08:58', '2021-08-05 03:02:04', NULL);
INSERT INTO "public"."journals" VALUES (8, 6, 800000, 800000, 'IJP an. Sangga Daya Anugerah', '2021-08-08', 2, 1, '2021-08-17 11:38:08', '2021-08-17 11:38:26', NULL);
INSERT INTO "public"."journals" VALUES (11, 8, 1000000, 1000000, '-', '2021-08-08', 2, 3, '2021-08-18 09:36:44', '2021-08-18 09:36:44', NULL);
INSERT INTO "public"."journals" VALUES (5, 3, 200000, 200000, 'IJP An. Si Itu', '2021-08-01', 4, 1, '2021-08-10 05:08:27', '2021-08-10 05:08:27', NULL);
INSERT INTO "public"."journals" VALUES (6, 3, 15000000, 15000000, 'Bunga Depo no. 100002020', '2021-08-01', 4, 1, '2021-08-10 05:09:13', '2021-08-10 05:09:13', NULL);
INSERT INTO "public"."journals" VALUES (13, 9, 1000000, 1000000, 'IJP an. Riska', '2021-08-08', 2, 1, '2021-08-19 10:35:26', '2021-08-19 10:35:26', NULL);
INSERT INTO "public"."journals" VALUES (2, 1, 1300000, 1300000, 'Pembayaran IJP an. Denny Indrayana', '2021-07-30', 2, 1, '2021-07-30 04:10:05', '2021-08-05 03:02:30', NULL);
INSERT INTO "public"."journals" VALUES (9, 7, 3000000, 3000000, 'Revisi Data', '2021-08-08', 2, 2, '2021-08-17 16:02:04', '2021-08-17 16:02:04', NULL);
INSERT INTO "public"."journals" VALUES (10, 8, 1000000, 1000000, '-', '2021-08-08', 7, 1, '2021-08-18 09:36:18', '2021-08-18 09:36:18', NULL);
INSERT INTO "public"."journals" VALUES (12, 9, 900000, 900000, 'IJP an. Dony', '2021-08-08', 7, 1, '2021-08-19 10:34:55', '2021-08-19 10:34:55', NULL);
INSERT INTO "public"."journals" VALUES (7, 2, 8000000, 8000000, 'IJP an Sangga Daya ANugerah', '2021-08-18', 7, 1, '2021-08-16 14:48:58', '2021-08-16 14:48:58', NULL);
INSERT INTO "public"."journals" VALUES (14, 10, 130000, 130000, 'IJP an. Rina', '2021-08-17', 2, 1, '2021-08-20 09:46:33', '2021-08-20 09:46:33', NULL);
INSERT INTO "public"."journals" VALUES (15, 10, 1300000, 1300000, 'IJP an. Rika', '2021-08-18', 2, 1, '2021-08-20 09:47:00', '2021-08-20 09:47:00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;
ALTER TABLE "public"."migrations" OWNER TO "postgres";

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO "public"."migrations" VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO "public"."migrations" VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (5, '2021_06_10_153027_create_codes_table', 1);
INSERT INTO "public"."migrations" VALUES (6, '2021_06_10_153055_create_header_journals_table', 1);
INSERT INTO "public"."migrations" VALUES (7, '2021_06_10_153057_create_journals_table', 1);
INSERT INTO "public"."migrations" VALUES (8, '2021_06_11_053310_create_status_headers_table', 1);
INSERT INTO "public"."migrations" VALUES (9, '2021_06_11_053404_add_status_to_header_journals', 1);
INSERT INTO "public"."migrations" VALUES (10, '2021_06_12_150727_add_set_to_codes', 1);
INSERT INTO "public"."migrations" VALUES (11, '2021_06_12_174627_create_saldos_table', 1);
INSERT INTO "public"."migrations" VALUES (12, '2021_06_15_033434_add_link_to_journals', 1);
INSERT INTO "public"."migrations" VALUES (13, '2021_07_15_073002_create_otoriz_firsts_table', 1);
INSERT INTO "public"."migrations" VALUES (14, '2021_07_15_080131_create_banks_table', 1);
INSERT INTO "public"."migrations" VALUES (15, '2021_07_18_082213_add_nik_to_users', 1);
INSERT INTO "public"."migrations" VALUES (16, '2021_07_19_134249_create_roles_table', 1);
INSERT INTO "public"."migrations" VALUES (17, '2021_07_19_134338_create_role_user_table', 1);
INSERT INTO "public"."migrations" VALUES (18, '2021_07_26_182653_create_final_saldos_table', 1);
INSERT INTO "public"."migrations" VALUES (34, '2021_08_14_143245_create_validation_finances_table', 2);
INSERT INTO "public"."migrations" VALUES (35, '2021_08_15_162836_create_transaction_types_table', 2);
INSERT INTO "public"."migrations" VALUES (37, '2021_08_18_110832_add_month_periode_to_header_journals', 3);
INSERT INTO "public"."migrations" VALUES (38, '2021_08_18_172118_add_color_to_codes', 4);
INSERT INTO "public"."migrations" VALUES (40, '2021_08_19_163135_create_group_codes_table', 6);
INSERT INTO "public"."migrations" VALUES (41, '2021_08_19_173323_add_group_code_id_to_codes', 7);
INSERT INTO "public"."migrations" VALUES (42, '2021_08_19_181434_add_delete_to_codes', 8);
COMMIT;

-- ----------------------------
-- Table structure for otoriz_firsts
-- ----------------------------
DROP TABLE IF EXISTS "public"."otoriz_firsts";
CREATE TABLE "public"."otoriz_firsts" (
  "id" int8 NOT NULL DEFAULT nextval('otoriz_firsts_id_seq'::regclass),
  "header_journals_id" int8 NOT NULL,
  "keterangan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "deleted_at" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."otoriz_firsts" OWNER TO "postgres";

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;
ALTER TABLE "public"."password_resets" OWNER TO "postgres";

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS "public"."role_user";
CREATE TABLE "public"."role_user" (
  "id" int8 NOT NULL DEFAULT nextval('role_user_id_seq'::regclass),
  "role_id" int8 NOT NULL,
  "user_id" int8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."role_user" OWNER TO "postgres";

-- ----------------------------
-- Records of role_user
-- ----------------------------
BEGIN;
INSERT INTO "public"."role_user" VALUES (1, 1, 1, NULL, NULL);
INSERT INTO "public"."role_user" VALUES (34, 3, 1, NULL, NULL);
INSERT INTO "public"."role_user" VALUES (35, 34, 1, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id" int8 NOT NULL DEFAULT nextval('roles_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."roles" OWNER TO "postgres";

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO "public"."roles" VALUES (1, 'admin', NULL, NULL);
INSERT INTO "public"."roles" VALUES (2, 'role_maker', NULL, NULL);
INSERT INTO "public"."roles" VALUES (3, 'role_validation_finance', NULL, NULL);
INSERT INTO "public"."roles" VALUES (4, 'role_validation_trust', NULL, NULL);
INSERT INTO "public"."roles" VALUES (5, 'role_otorization_trust', NULL, NULL);
INSERT INTO "public"."roles" VALUES (6, 'role_otorization_finance', NULL, NULL);
INSERT INTO "public"."roles" VALUES (34, 'role_finance', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for saldos
-- ----------------------------
DROP TABLE IF EXISTS "public"."saldos";
CREATE TABLE "public"."saldos" (
  "id" int8 NOT NULL DEFAULT nextval('saldos_id_seq'::regclass),
  "code_id" int8 NOT NULL,
  "tahun" int4 NOT NULL,
  "mount" float8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."saldos" OWNER TO "postgres";

-- ----------------------------
-- Table structure for status_headers
-- ----------------------------
DROP TABLE IF EXISTS "public"."status_headers";
CREATE TABLE "public"."status_headers" (
  "id" int8 NOT NULL DEFAULT nextval('status_headers_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."status_headers" OWNER TO "postgres";

-- ----------------------------
-- Records of status_headers
-- ----------------------------
BEGIN;
INSERT INTO "public"."status_headers" VALUES (1, 'draft', NULL, NULL);
INSERT INTO "public"."status_headers" VALUES (2, 'pending', NULL, NULL);
INSERT INTO "public"."status_headers" VALUES (3, 'released', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for transaction_types
-- ----------------------------
DROP TABLE IF EXISTS "public"."transaction_types";
CREATE TABLE "public"."transaction_types" (
  "id" int8 NOT NULL DEFAULT nextval('transaction_types_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."transaction_types" OWNER TO "postgres";

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "two_factor_secret" text COLLATE "pg_catalog"."default",
  "two_factor_recovery_codes" text COLLATE "pg_catalog"."default",
  "nik" varchar(255) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."users" OWNER TO "postgres";

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO "public"."users" VALUES (1, 'admin', 'admin@admin.com', NULL, '$2y$10$mACyturA3DDu8ULpujHxI.RjsoKt3dRfM7zp0hx63E7AI7.ORLhyC', NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for validation_finances
-- ----------------------------
DROP TABLE IF EXISTS "public"."validation_finances";
CREATE TABLE "public"."validation_finances" (
  "id" int8 NOT NULL DEFAULT nextval('validation_finances_id_seq'::regclass),
  "header_journal_id" int8 NOT NULL,
  "user_id" int8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."validation_finances" OWNER TO "postgres";

-- ----------------------------
-- Records of validation_finances
-- ----------------------------
BEGIN;
INSERT INTO "public"."validation_finances" VALUES (1, 2, 1, '2021-08-16 20:42:30', '2021-08-16 20:42:30');
INSERT INTO "public"."validation_finances" VALUES (2, 3, 1, '2021-08-16 20:42:38', '2021-08-16 20:42:38');
INSERT INTO "public"."validation_finances" VALUES (3, 1, 1, '2021-08-16 20:42:43', '2021-08-16 20:42:43');
INSERT INTO "public"."validation_finances" VALUES (4, 6, 1, '2021-08-17 11:38:56', '2021-08-17 11:38:56');
INSERT INTO "public"."validation_finances" VALUES (5, 7, 1, '2021-08-17 16:02:24', '2021-08-17 16:02:24');
INSERT INTO "public"."validation_finances" VALUES (6, 8, 1, '2021-08-18 09:37:49', '2021-08-18 09:37:49');
INSERT INTO "public"."validation_finances" VALUES (7, 9, 1, '2021-08-19 10:42:32', '2021-08-19 10:42:32');
INSERT INTO "public"."validation_finances" VALUES (8, 10, 1, '2021-08-20 09:58:59', '2021-08-20 09:58:59');
COMMIT;

-- ----------------------------
-- View structure for vsumdebetkredit
-- ----------------------------
DROP VIEW IF EXISTS "public"."vsumdebetkredit";
CREATE VIEW "public"."vsumdebetkredit" AS  SELECT sum(j.debet) AS debet,
    sum(j.kredit) AS kredit,
    j.header_journals_id
   FROM journals j
  GROUP BY j.header_journals_id;
ALTER TABLE "public"."vsumdebetkredit" OWNER TO "postgres";

-- ----------------------------
-- View structure for vjournal
-- ----------------------------
DROP VIEW IF EXISTS "public"."vjournal";
CREATE VIEW "public"."vjournal" AS  SELECT row_number() OVER (ORDER BY j.id) AS "group",
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
   FROM ((((journals j
     JOIN codes c ON ((c.id = j.debet_code_id)))
     JOIN codes c2 ON ((c2.id = j.kredit_code_id)))
     JOIN header_journals hj ON ((hj.id = j.header_journals_id)))
     JOIN status_headers sh ON ((sh.id = hj.status_header_id)));
ALTER TABLE "public"."vjournal" OWNER TO "postgres";

-- ----------------------------
-- View structure for vjurnal_format
-- ----------------------------
DROP VIEW IF EXISTS "public"."vjurnal_format";
CREATE VIEW "public"."vjurnal_format" AS  SELECT v.tanggal_transaksi,
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
   FROM vjournal v;
ALTER TABLE "public"."vjurnal_format" OWNER TO "postgres";

-- ----------------------------
-- View structure for vjournal_single_format
-- ----------------------------
DROP VIEW IF EXISTS "public"."vjournal_single_format";
CREATE VIEW "public"."vjournal_single_format" AS  SELECT v.tanggal_transaksi,
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
           FROM codes
          WHERE ((codes.code)::text = (v.code)::text)) AS code_name
   FROM vjournal v;
ALTER TABLE "public"."vjournal_single_format" OWNER TO "postgres";

-- ----------------------------
-- View structure for vsaldo_final
-- ----------------------------
DROP VIEW IF EXISTS "public"."vsaldo_final";
CREATE VIEW "public"."vsaldo_final" AS  SELECT vsf.code,
    sum(vsf.debet) AS amount,
    vsf.header_journals_id
   FROM vjournal_single_format vsf
  WHERE ((vsf.status_name)::text = 'released'::text)
  GROUP BY vsf.code, vsf.header_journals_id;
ALTER TABLE "public"."vsaldo_final" OWNER TO "postgres";

-- ----------------------------
-- View structure for vsaldo
-- ----------------------------
DROP VIEW IF EXISTS "public"."vsaldo";
CREATE VIEW "public"."vsaldo" AS  SELECT vsf.code,
    sum(vsf.debet) AS amount,
    vsf.header_journals_id,
    vsf.code_name,
    ( SELECT sum(vsaldo_final.amount) AS sum
           FROM vsaldo_final
          WHERE ((vsaldo_final.code)::text = (vsf.code)::text)) AS saldo_akhir
   FROM vjournal_single_format vsf
  GROUP BY vsf.code, vsf.header_journals_id, vsf.code_name;
ALTER TABLE "public"."vsaldo" OWNER TO "postgres";

-- ----------------------------
-- View structure for vsaldo_bank
-- ----------------------------
DROP VIEW IF EXISTS "public"."vsaldo_bank";
CREATE VIEW "public"."vsaldo_bank" AS  SELECT vsf.code,
    sum(vsf.debet) AS amount,
    ( SELECT banks.name
           FROM (banks
             JOIN codes ON ((codes.id = banks.code_id)))
          WHERE ((codes.code)::text = (vsf.code)::text)) AS name,
    ( SELECT codes.color
           FROM codes
          WHERE ((codes.code)::text = (vsf.code)::text)) AS color,
    ( SELECT codes.keterangan
           FROM codes
          WHERE ((codes.code)::text = (vsf.code)::text)) AS code_name,
    ( SELECT gc.name
           FROM (codes
             JOIN group_codes gc ON ((gc.id = codes.group_code_id)))
          WHERE ((codes.code)::text = (vsf.code)::text)) AS "group"
   FROM vjournal_single_format vsf
  WHERE ((vsf.status_name)::text = 'released'::text)
  GROUP BY vsf.code;
ALTER TABLE "public"."vsaldo_bank" OWNER TO "postgres";

-- ----------------------------
-- View structure for vsaldo_all
-- ----------------------------
DROP VIEW IF EXISTS "public"."vsaldo_all";
CREATE VIEW "public"."vsaldo_all" AS  SELECT codes.id,
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
           FROM vsaldo_final
          WHERE ((vsaldo_final.code)::text = (codes.code)::text)) AS saldo
   FROM (codes
     JOIN group_codes ON ((group_codes.id = codes.group_code_id)))
  WHERE (codes.deleted_at IS NULL);
ALTER TABLE "public"."vsaldo_all" OWNER TO "postgres";

-- ----------------------------
-- View structure for vsaldo_ijp
-- ----------------------------
DROP VIEW IF EXISTS "public"."vsaldo_ijp";
CREATE VIEW "public"."vsaldo_ijp" AS  SELECT date_trunc('month'::text, (vsf.tanggal_transaksi)::timestamp with time zone) AS mon,
    sum(vsf.debet) AS amount
   FROM vjournal_single_format vsf
  WHERE ((vsf.code)::text = '1100001'::text)
  GROUP BY (date_trunc('month'::text, (vsf.tanggal_transaksi)::timestamp with time zone));
ALTER TABLE "public"."vsaldo_ijp" OWNER TO "postgres";

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."banks_id_seq"
OWNED BY "public"."banks"."id";
SELECT setval('"public"."banks_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."codes_id_seq"
OWNED BY "public"."codes"."id";
SELECT setval('"public"."codes_id_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."final_saldos_id_seq"
OWNED BY "public"."final_saldos"."id";
SELECT setval('"public"."final_saldos_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."group_codes_id_seq"
OWNED BY "public"."group_codes"."id";
SELECT setval('"public"."group_codes_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."header_journals_id_seq"
OWNED BY "public"."header_journals"."id";
SELECT setval('"public"."header_journals_id_seq"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."journals_id_seq"
OWNED BY "public"."journals"."id";
SELECT setval('"public"."journals_id_seq"', 16, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 43, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."otoriz_firsts_id_seq"
OWNED BY "public"."otoriz_firsts"."id";
SELECT setval('"public"."otoriz_firsts_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."role_user_id_seq"
OWNED BY "public"."role_user"."id";
SELECT setval('"public"."role_user_id_seq"', 36, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."roles_id_seq"
OWNED BY "public"."roles"."id";
SELECT setval('"public"."roles_id_seq"', 35, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."saldos_id_seq"
OWNED BY "public"."saldos"."id";
SELECT setval('"public"."saldos_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."status_headers_id_seq"
OWNED BY "public"."status_headers"."id";
SELECT setval('"public"."status_headers_id_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."transaction_types_id_seq"
OWNED BY "public"."transaction_types"."id";
SELECT setval('"public"."transaction_types_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."validation_finances_id_seq"
OWNED BY "public"."validation_finances"."id";
SELECT setval('"public"."validation_finances_id_seq"', 9, true);

-- ----------------------------
-- Primary Key structure for table banks
-- ----------------------------
ALTER TABLE "public"."banks" ADD CONSTRAINT "banks_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table banks
-- ----------------------------
ALTER TABLE "public"."banks" ADD CONSTRAINT "banks_code_id_foreign" FOREIGN KEY ("code_id") REFERENCES "public"."codes" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Primary Key structure for table codes
-- ----------------------------
ALTER TABLE "public"."codes" ADD CONSTRAINT "codes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table codes
-- ----------------------------
ALTER TABLE "public"."codes" ADD CONSTRAINT "codes_group_code_id_foreign" FOREIGN KEY ("group_code_id") REFERENCES "public"."group_codes" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Uniques structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_uuid_unique" UNIQUE ("uuid");

-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table final_saldos
-- ----------------------------
ALTER TABLE "public"."final_saldos" ADD CONSTRAINT "final_saldos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table final_saldos
-- ----------------------------
ALTER TABLE "public"."final_saldos" ADD CONSTRAINT "final_saldos_code_id_foreign" FOREIGN KEY ("code_id") REFERENCES "public"."codes" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Primary Key structure for table group_codes
-- ----------------------------
ALTER TABLE "public"."group_codes" ADD CONSTRAINT "group_codes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table header_journals
-- ----------------------------
ALTER TABLE "public"."header_journals" ADD CONSTRAINT "header_journals_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table header_journals
-- ----------------------------
ALTER TABLE "public"."header_journals" ADD CONSTRAINT "header_journals_status_header_id_foreign" FOREIGN KEY ("status_header_id") REFERENCES "public"."status_headers" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Primary Key structure for table journals
-- ----------------------------
ALTER TABLE "public"."journals" ADD CONSTRAINT "journals_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table journals
-- ----------------------------
ALTER TABLE "public"."journals" ADD CONSTRAINT "journals_debet_code_id_foreign" FOREIGN KEY ("debet_code_id") REFERENCES "public"."codes" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."journals" ADD CONSTRAINT "journals_header_journals_id_foreign" FOREIGN KEY ("header_journals_id") REFERENCES "public"."header_journals" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."journals" ADD CONSTRAINT "journals_kredit_code_id_foreign" FOREIGN KEY ("kredit_code_id") REFERENCES "public"."codes" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table otoriz_firsts
-- ----------------------------
ALTER TABLE "public"."otoriz_firsts" ADD CONSTRAINT "otoriz_firsts_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table otoriz_firsts
-- ----------------------------
ALTER TABLE "public"."otoriz_firsts" ADD CONSTRAINT "otoriz_firsts_header_journals_id_foreign" FOREIGN KEY ("header_journals_id") REFERENCES "public"."header_journals" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table role_user
-- ----------------------------
ALTER TABLE "public"."role_user" ADD CONSTRAINT "role_user_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table role_user
-- ----------------------------
ALTER TABLE "public"."role_user" ADD CONSTRAINT "role_user_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."role_user" ADD CONSTRAINT "role_user_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table saldos
-- ----------------------------
ALTER TABLE "public"."saldos" ADD CONSTRAINT "saldos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table saldos
-- ----------------------------
ALTER TABLE "public"."saldos" ADD CONSTRAINT "saldos_code_id_foreign" FOREIGN KEY ("code_id") REFERENCES "public"."codes" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Primary Key structure for table status_headers
-- ----------------------------
ALTER TABLE "public"."status_headers" ADD CONSTRAINT "status_headers_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table transaction_types
-- ----------------------------
ALTER TABLE "public"."transaction_types" ADD CONSTRAINT "transaction_types_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table validation_finances
-- ----------------------------
ALTER TABLE "public"."validation_finances" ADD CONSTRAINT "validation_finances_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table validation_finances
-- ----------------------------
ALTER TABLE "public"."validation_finances" ADD CONSTRAINT "validation_finances_header_journal_id_foreign" FOREIGN KEY ("header_journal_id") REFERENCES "public"."header_journals" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."validation_finances" ADD CONSTRAINT "validation_finances_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
