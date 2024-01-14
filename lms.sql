--
-- PostgreSQL database dump
--

-- Dumped from database version 15.5 (Ubuntu 15.5-1.pgdg22.04+1)
-- Dumped by pg_dump version 16.1 (Ubuntu 16.1-1.pgdg22.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: courses; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.courses (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text NOT NULL,
    duration character varying(255) NOT NULL,
    material character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.courses OWNER TO developer;

--
-- Name: courses_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.courses_id_seq OWNER TO developer;

--
-- Name: courses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.courses_id_seq OWNED BY public.courses.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO developer;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO developer;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: kategori; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.kategori (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.kategori OWNER TO developer;

--
-- Name: kategori_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.kategori_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.kategori_id_seq OWNER TO developer;

--
-- Name: kategori_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.kategori_id_seq OWNED BY public.kategori.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO developer;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO developer;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO developer;

--
-- Name: pelatihan; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.pelatihan (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    image_url character varying(255) NOT NULL,
    deskripsi text NOT NULL,
    durasi character varying(255) NOT NULL,
    tanggal_pelaksanaan date NOT NULL,
    tempat_pelaksanaan text NOT NULL,
    jenis_kuota character varying(255) NOT NULL,
    kuota integer NOT NULL,
    jenis_pelaksanaan character varying(255) NOT NULL,
    kategori bigint NOT NULL,
    users bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT pelatihan_jenis_kuota_check CHECK (((jenis_kuota)::text = ANY ((ARRAY['limitid'::character varying, 'unlimited'::character varying])::text[]))),
    CONSTRAINT pelatihan_jenis_pelaksanaan_check CHECK (((jenis_pelaksanaan)::text = ANY ((ARRAY['khuhus'::character varying, 'umum'::character varying])::text[])))
);


ALTER TABLE public.pelatihan OWNER TO developer;

--
-- Name: pelatihan_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.pelatihan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pelatihan_id_seq OWNER TO developer;

--
-- Name: pelatihan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.pelatihan_id_seq OWNED BY public.pelatihan.id;


--
-- Name: pendaftaran; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.pendaftaran (
    id bigint NOT NULL,
    users bigint NOT NULL,
    pelatihan bigint NOT NULL,
    tanggal_pendaftaran date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pendaftaran OWNER TO developer;

--
-- Name: pendaftaran_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.pendaftaran_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pendaftaran_id_seq OWNER TO developer;

--
-- Name: pendaftaran_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.pendaftaran_id_seq OWNED BY public.pendaftaran.id;


--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO developer;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO developer;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: role_users; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.role_users (
    user_id bigint NOT NULL,
    role_id bigint NOT NULL
);


ALTER TABLE public.role_users OWNER TO developer;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT roles_nama_check CHECK (((nama)::text = ANY ((ARRAY['pegawai'::character varying, 'mentor'::character varying, 'admin'::character varying])::text[])))
);


ALTER TABLE public.roles OWNER TO developer;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.roles_id_seq OWNER TO developer;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: sertifikat; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.sertifikat (
    id bigint NOT NULL,
    users bigint NOT NULL,
    pelatihan bigint NOT NULL,
    image_url character varying(255) NOT NULL,
    tanggal_terbit date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.sertifikat OWNER TO developer;

--
-- Name: sertifikat_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.sertifikat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.sertifikat_id_seq OWNER TO developer;

--
-- Name: sertifikat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.sertifikat_id_seq OWNED BY public.sertifikat.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: developer
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    alamat character varying(255),
    no_hp character varying(255),
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO developer;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: developer
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO developer;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: developer
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: courses id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.courses ALTER COLUMN id SET DEFAULT nextval('public.courses_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: kategori id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.kategori ALTER COLUMN id SET DEFAULT nextval('public.kategori_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: pelatihan id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pelatihan ALTER COLUMN id SET DEFAULT nextval('public.pelatihan_id_seq'::regclass);


--
-- Name: pendaftaran id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pendaftaran ALTER COLUMN id SET DEFAULT nextval('public.pendaftaran_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: sertifikat id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.sertifikat ALTER COLUMN id SET DEFAULT nextval('public.sertifikat_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.courses (id, name, description, duration, material, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: kategori; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.kategori (id, nama, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.migrations (id, migration, batch) FROM stdin;
5	2024_01_10_135017_create_courses_table	2
22	2014_10_12_000000_create_users_table	3
23	2014_10_12_100000_create_password_reset_tokens_table	3
24	2019_08_19_000000_create_failed_jobs_table	3
25	2019_12_14_000001_create_personal_access_tokens_table	3
26	2024_01_10_164507_create_roles_table	3
27	2024_01_10_165933_create_kategori_table	3
28	2024_01_10_232601_create_role_users_table	3
29	2024_01_10_234911_create_table_pelatihan	3
30	2024_01_10_234922_create_table_pendaftaran	3
31	2024_01_10_234932_create_table_sertifikat	3
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: pelatihan; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.pelatihan (id, nama, image_url, deskripsi, durasi, tanggal_pelaksanaan, tempat_pelaksanaan, jenis_kuota, kuota, jenis_pelaksanaan, kategori, users, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: pendaftaran; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.pendaftaran (id, users, pelatihan, tanggal_pendaftaran, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: role_users; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.role_users (user_id, role_id) FROM stdin;
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.roles (id, nama, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sertifikat; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.sertifikat (id, users, pelatihan, image_url, tanggal_terbit, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: developer
--

COPY public.users (id, name, email, email_verified_at, alamat, no_hp, password, remember_token, created_at, updated_at) FROM stdin;
1	admin	admin@gmail.com	\N	\N	\N	$2y$12$N0Wl7t78a.RC2E1HBjehGuaba1KnPJPB1g6brKhIvX23OcVAFjG3K	\N	2024-01-11 01:47:52	2024-01-11 01:47:52
\.


--
-- Name: courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.courses_id_seq', 1, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: kategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.kategori_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.migrations_id_seq', 31, true);


--
-- Name: pelatihan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.pelatihan_id_seq', 1, false);


--
-- Name: pendaftaran_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.pendaftaran_id_seq', 1, false);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);


--
-- Name: sertifikat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.sertifikat_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: developer
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- Name: courses courses_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: kategori kategori_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.kategori
    ADD CONSTRAINT kategori_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: pelatihan pelatihan_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pelatihan
    ADD CONSTRAINT pelatihan_pkey PRIMARY KEY (id);


--
-- Name: pendaftaran pendaftaran_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pendaftaran
    ADD CONSTRAINT pendaftaran_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: sertifikat sertifikat_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.sertifikat
    ADD CONSTRAINT sertifikat_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: developer
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: pelatihan kategori_pelatihan_id; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pelatihan
    ADD CONSTRAINT kategori_pelatihan_id FOREIGN KEY (kategori) REFERENCES public.kategori(id);


--
-- Name: pendaftaran pelatihan_pendaftaran_id; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pendaftaran
    ADD CONSTRAINT pelatihan_pendaftaran_id FOREIGN KEY (pelatihan) REFERENCES public.pelatihan(id);


--
-- Name: sertifikat pelatihan_sertifikat_id; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.sertifikat
    ADD CONSTRAINT pelatihan_sertifikat_id FOREIGN KEY (pelatihan) REFERENCES public.pelatihan(id);


--
-- Name: role_users role_users_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.role_users
    ADD CONSTRAINT role_users_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id);


--
-- Name: role_users role_users_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.role_users
    ADD CONSTRAINT role_users_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: pelatihan user_pelatihan_id; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pelatihan
    ADD CONSTRAINT user_pelatihan_id FOREIGN KEY (users) REFERENCES public.users(id);


--
-- Name: pendaftaran user_pendaftaran_id; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.pendaftaran
    ADD CONSTRAINT user_pendaftaran_id FOREIGN KEY (users) REFERENCES public.users(id);


--
-- Name: sertifikat user_sertifikat_id; Type: FK CONSTRAINT; Schema: public; Owner: developer
--

ALTER TABLE ONLY public.sertifikat
    ADD CONSTRAINT user_sertifikat_id FOREIGN KEY (users) REFERENCES public.users(id);


--
-- PostgreSQL database dump complete
--

