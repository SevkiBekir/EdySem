--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.5
-- Dumped by pg_dump version 9.5.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: eLearningProject; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "eLearningProject";


ALTER SCHEMA "eLearningProject" OWNER TO postgres;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: iptables_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE iptables_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE iptables_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: IPTables; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "IPTables" (
    id integer DEFAULT nextval('public.iptables_id_seq'::regclass) NOT NULL,
    "userId" integer,
    "IP" character varying(15),
    "where" character varying(100),
    date timestamp without time zone
);


ALTER TABLE "IPTables" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: bills_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bills_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bills_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: bills; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE bills (
    id integer DEFAULT nextval('public.bills_id_seq'::regclass) NOT NULL,
    "billNo" character varying(10),
    "courseId" integer,
    "userId" integer,
    "createdDate" timestamp without time zone
);


ALTER TABLE bills OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: catagories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE catagories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catagories_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: catagories; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE catagories (
    id integer DEFAULT nextval('public.catagories_id_seq'::regclass) NOT NULL,
    name character varying(30)
);


ALTER TABLE catagories OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: chapters_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE chapters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE chapters_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: chapters; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE chapters (
    id integer DEFAULT nextval('public.chapters_id_seq'::regclass) NOT NULL,
    name character varying(45),
    no integer,
    "courseId" integer
);


ALTER TABLE chapters OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: cities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cities_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: cities; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE cities (
    id integer DEFAULT nextval('public.cities_id_seq'::regclass) NOT NULL,
    name character varying(45)
);


ALTER TABLE cities OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: comments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE comments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE comments_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: comments; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE comments (
    id integer DEFAULT nextval('public.comments_id_seq'::regclass) NOT NULL,
    "userId" integer,
    permission integer,
    "courseId" integer,
    "createdDate" timestamp without time zone,
    "updatedDate" timestamp without time zone,
    "isActive" integer
);


ALTER TABLE comments OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: coursedetails_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE coursedetails_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE coursedetails_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: courseDetails; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "courseDetails" (
    id integer DEFAULT nextval('public.coursedetails_id_seq'::regclass) NOT NULL,
    "courseId" integer,
    summary character varying(1000),
    objectives character varying(1000)
);


ALTER TABLE "courseDetails" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: coursetouser_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE coursetouser_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE coursetouser_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: courseToUser; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "courseToUser" (
    id integer DEFAULT nextval('public.coursetouser_id_seq'::regclass) NOT NULL,
    "courseId" integer,
    "userId" integer,
    date timestamp without time zone
);


ALTER TABLE "courseToUser" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: courses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE courses_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: courses; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE courses (
    id integer DEFAULT nextval('public.courses_id_seq'::regclass) NOT NULL,
    name character varying(200),
    "instructorId" integer,
    "catagoryId" integer,
    price character varying(10),
    "createdDate" timestamp without time zone,
    "updatedDate" timestamp without time zone,
    "isActive" integer
);


ALTER TABLE courses OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: discussions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE discussions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE discussions_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: discussions; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE discussions (
    id integer DEFAULT nextval('public.discussions_id_seq'::regclass) NOT NULL,
    "userId" integer,
    "courseId" integer,
    title character varying(45),
    "createdDate" character varying(45)
);


ALTER TABLE discussions OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: documenttypes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE documenttypes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE documenttypes_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: documentTypes; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "documentTypes" (
    id integer DEFAULT nextval('public.documenttypes_id_seq'::regclass) NOT NULL,
    name character varying(45)
);


ALTER TABLE "documentTypes" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: documents_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE documents_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE documents_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: documents; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE documents (
    id integer DEFAULT nextval('public.documents_id_seq'::regclass) NOT NULL,
    "documentTypeId" integer,
    "courseId" integer,
    "lessonId" integer,
    "createdDate" timestamp without time zone,
    "uploadedDate" timestamp without time zone,
    explanation character varying(300),
    name character varying(200),
    "isAsset" integer DEFAULT 0
);


ALTER TABLE documents OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: educationlevels_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE educationlevels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE educationlevels_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: educationLevels; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "educationLevels" (
    id integer DEFAULT nextval('public.educationlevels_id_seq'::regclass) NOT NULL,
    name character varying(30)
);


ALTER TABLE "educationLevels" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: examprocess_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE examprocess_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE examprocess_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: examProcess; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "examProcess" (
    id integer DEFAULT nextval('public.examprocess_id_seq'::regclass) NOT NULL,
    "userId" integer,
    "chapterId" integer,
    "isSuccess" integer,
    "Grade" integer
);


ALTER TABLE "examProcess" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: examtypes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE examtypes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE examtypes_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: examTypes; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "examTypes" (
    id integer DEFAULT nextval('public.examtypes_id_seq'::regclass) NOT NULL,
    name character varying(45)
);


ALTER TABLE "examTypes" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: exams_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE exams_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE exams_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: exams; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE exams (
    id integer DEFAULT nextval('public.exams_id_seq'::regclass) NOT NULL,
    "questionId" integer,
    "createdDate" timestamp without time zone,
    "updatedDate" timestamp without time zone,
    "InstructorId" integer,
    "chapterId" integer
);


ALTER TABLE exams OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: lessonlegends_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE lessonlegends_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE lessonlegends_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: lessonLegends; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "lessonLegends" (
    id integer DEFAULT nextval('public.lessonlegends_id_seq'::regclass) NOT NULL,
    name character varying(30)
);


ALTER TABLE "lessonLegends" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: lessonprogress_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE lessonprogress_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE lessonprogress_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: lessonProgress; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "lessonProgress" (
    id integer DEFAULT nextval('public.lessonprogress_id_seq'::regclass) NOT NULL,
    "userId" integer,
    "lessonId" integer,
    "lessonLegendId" integer DEFAULT 1
);


ALTER TABLE "lessonProgress" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: lessons_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE lessons_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE lessons_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: lessons; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE lessons (
    id integer DEFAULT nextval('public.lessons_id_seq'::regclass) NOT NULL,
    "chapterId" integer,
    name character varying(200),
    duration character varying(10),
    "typeId" integer,
    no integer DEFAULT (-1) NOT NULL
);


ALTER TABLE lessons OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: links_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE links_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE links_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: links; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE links (
    id integer DEFAULT nextval('public.links_id_seq'::regclass) NOT NULL,
    "courseId" integer,
    name character varying(100),
    "lessonId" integer
);


ALTER TABLE links OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: occupations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE occupations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE occupations_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: occupations; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE occupations (
    id integer DEFAULT nextval('public.occupations_id_seq'::regclass) NOT NULL,
    name character varying(30)
);


ALTER TABLE occupations OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: paymentprocess_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paymentprocess_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paymentprocess_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: paymentProcess; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "paymentProcess" (
    id integer DEFAULT nextval('public.paymentprocess_id_seq'::regclass) NOT NULL,
    "userId" integer,
    "courseId" integer,
    situation character varying(200),
    date timestamp without time zone
);


ALTER TABLE "paymentProcess" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: posts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE posts_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: posts; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE posts (
    id integer DEFAULT nextval('public.posts_id_seq'::regclass) NOT NULL,
    "userId" integer,
    "discussionId" integer,
    "createdDate" character varying(45),
    "updatedDate" character varying(45),
    content character varying(2000)
);


ALTER TABLE posts OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: questions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE questions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE questions_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: questions; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE questions (
    id integer DEFAULT nextval('public.questions_id_seq'::regclass) NOT NULL,
    question character varying(45),
    "correctAnswer" character varying(45),
    duration integer,
    "examTypeId" integer
);


ALTER TABLE questions OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: ratings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ratings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ratings_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: ratings; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE ratings (
    id integer DEFAULT nextval('public.ratings_id_seq'::regclass) NOT NULL,
    "courseId" integer,
    stars character varying(1)
);


ALTER TABLE ratings OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: sems_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sems_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sems_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: sems; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE sems (
    id integer DEFAULT nextval('public.sems_id_seq'::regclass) NOT NULL,
    "personalName" character varying(45),
    "personalSurname" character varying(45),
    email character varying(45),
    telephone character varying(45),
    "universityId" integer,
    "createdDate" timestamp without time zone,
    "updatedDate" timestamp without time zone
);


ALTER TABLE sems OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: tags_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tags_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: tags; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE tags (
    id integer DEFAULT nextval('public.tags_id_seq'::regclass) NOT NULL,
    "lessonId" integer,
    name character varying(45)
);


ALTER TABLE tags OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: universities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE universities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE universities_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: universities; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE universities (
    id integer DEFAULT nextval('public.universities_id_seq'::regclass) NOT NULL,
    name character varying(45),
    "cityId" integer
);


ALTER TABLE universities OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: userdetails_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE userdetails_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE userdetails_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: userDetails; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "userDetails" (
    "userId" integer,
    age character varying(2),
    phone character varying(15),
    "typeId" integer,
    "occupationId" integer,
    "educationId" integer,
    "fbUserName" character varying(45),
    "twUserName" character varying(45),
    about character varying(1000),
    "profileImageURL" character varying(200),
    "tcNo" character varying(11),
    address character varying(1000),
    gender character varying(1),
    id integer DEFAULT nextval('public.userdetails_id_seq'::regclass) NOT NULL
);


ALTER TABLE "userDetails" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: usertypes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usertypes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usertypes_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: userTypes; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE "userTypes" (
    id integer DEFAULT nextval('public.usertypes_id_seq'::regclass) NOT NULL,
    name character varying(20)
);


ALTER TABLE "userTypes" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: users; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE users (
    id integer DEFAULT nextval('public.user_id_seq'::regclass) NOT NULL,
    firstname character varying(45),
    lastname character varying(45),
    email character varying(50),
    password character varying(50),
    "createdDate" timestamp without time zone,
    "updatedDate" timestamp without time zone,
    username character varying(45) DEFAULT '#'::character varying NOT NULL
);


ALTER TABLE users OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: views_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE views_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE views_id_seq OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Name: views; Type: TABLE; Schema: eLearningProject; Owner: postgres
--

CREATE TABLE views (
    id integer DEFAULT nextval('public.views_id_seq'::regclass) NOT NULL,
    "viewerId" integer,
    "documentId" integer
);


ALTER TABLE views OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: eLearningProject.IPTables_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.IPTables_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.IPTables_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.bills_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.bills_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.bills_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.catagories_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.catagories_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.catagories_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.chapters_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.chapters_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.chapters_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.cities_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.cities_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.cities_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.comments_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.comments_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.comments_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.courseDetails_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.courseDetails_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.courseDetails_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.courseToUser_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.courseToUser_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.courseToUser_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.courses_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.courses_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.courses_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.discussions_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.discussions_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.discussions_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.documentTypes_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.documentTypes_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.documentTypes_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.educationLevels_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.educationLevels_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.educationLevels_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.examProcess_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.examProcess_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.examProcess_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.examTypes_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.examTypes_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.examTypes_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.exams_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.exams_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.exams_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.lessonLegends_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.lessonLegends_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.lessonLegends_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.lessonProgress_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.lessonProgress_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.lessonProgress_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.lessons_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.lessons_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.lessons_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.occupations_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.occupations_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.occupations_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.paymentProcess_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.paymentProcess_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.paymentProcess_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.posts_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.posts_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.posts_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.questions_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.questions_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.questions_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.ratings_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.ratings_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.ratings_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.sems_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.sems_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.sems_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.tags_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.tags_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.tags_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.universities_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.universities_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.universities_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.userTypes_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.userTypes_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.userTypes_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.users_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.users_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.users_id_sequence" OWNER TO postgres;

--
-- Name: eLearningProject.views_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "eLearningProject.views_id_sequence"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "eLearningProject.views_id_sequence" OWNER TO postgres;

SET search_path = "eLearningProject", pg_catalog;

--
-- Data for Name: IPTables; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "IPTables" (id, "userId", "IP", "where", date) FROM stdin;
\.


--
-- Data for Name: bills; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY bills (id, "billNo", "courseId", "userId", "createdDate") FROM stdin;
\.


--
-- Data for Name: catagories; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY catagories (id, name) FROM stdin;
1	Computer Science
2	Biology
\.


--
-- Data for Name: chapters; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY chapters (id, name, no, "courseId") FROM stdin;
1	Welcome	1	1
2	Conditions	2	1
3	Loops	3	1
4	Arrays	4	1
\.


--
-- Data for Name: cities; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY cities (id, name) FROM stdin;
\.


--
-- Data for Name: comments; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY comments (id, "userId", permission, "courseId", "createdDate", "updatedDate", "isActive") FROM stdin;
\.


--
-- Data for Name: courseDetails; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "courseDetails" (id, "courseId", summary, objectives) FROM stdin;
1	1	if clause	to learn coding C
\.


--
-- Data for Name: courseToUser; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "courseToUser" (id, "courseId", "userId", date) FROM stdin;
\.


--
-- Data for Name: courses; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY courses (id, name, "instructorId", "catagoryId", price, "createdDate", "updatedDate", "isActive") FROM stdin;
1	How to Code C	1	1	100	2016-05-26 19:35:18.243131	2016-06-26 19:55:18.243131	1
\.


--
-- Data for Name: discussions; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY discussions (id, "userId", "courseId", title, "createdDate") FROM stdin;
\.


--
-- Data for Name: documentTypes; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "documentTypes" (id, name) FROM stdin;
1	.mp4
\.


--
-- Data for Name: documents; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY documents (id, "documentTypeId", "courseId", "lessonId", "createdDate", "uploadedDate", explanation, name, "isAsset") FROM stdin;
\.


--
-- Data for Name: educationLevels; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "educationLevels" (id, name) FROM stdin;
1	Lisans
2	Yüksek Lisans
3	Doktora
\.


--
-- Data for Name: examProcess; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "examProcess" (id, "userId", "chapterId", "isSuccess", "Grade") FROM stdin;
\.


--
-- Data for Name: examTypes; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "examTypes" (id, name) FROM stdin;
\.


--
-- Data for Name: exams; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY exams (id, "questionId", "createdDate", "updatedDate", "InstructorId", "chapterId") FROM stdin;
\.


--
-- Data for Name: lessonLegends; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "lessonLegends" (id, name) FROM stdin;
1	Başlanılmadı
2	Devam Ediyor
3	Tamamlandı
\.


--
-- Data for Name: lessonProgress; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "lessonProgress" (id, "userId", "lessonId", "lessonLegendId") FROM stdin;
1	2	1	3
2	2	2	3
3	2	3	2
4	2	4	1
5	2	5	1
6	2	6	1
7	2	7	1
8	2	8	1
\.


--
-- Data for Name: lessons; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY lessons (id, "chapterId", name, duration, "typeId", no) FROM stdin;
3	2	If Clause	30	1	1
4	2	Switch-Case	30	1	2
5	3	For Loop	40	1	1
6	3	While Loop	60	1	2
1	1	What is Programming Language	45	1	1
2	1	What is C	50	1	2
7	4	What is Arrays	45	1	1
8	4	Char Int Array	60	1	2
\.


--
-- Data for Name: links; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY links (id, "courseId", name, "lessonId") FROM stdin;
87	1	How-to-Code-C	\N
88	\N	What-is-C	2
89	\N	What-is-Programming-Language	1
90	\N	If-Clause	3
91	\N	Switch-Case	4
92	\N	While-Loop	6
93	\N	For-Loop	5
94	\N	What-is-Arrays	7
95	\N	Char-Int-Array	8
\.


--
-- Data for Name: occupations; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY occupations (id, name) FROM stdin;
1	Mühendis
2	Öğretmen
\.


--
-- Data for Name: paymentProcess; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "paymentProcess" (id, "userId", "courseId", situation, date) FROM stdin;
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY posts (id, "userId", "discussionId", "createdDate", "updatedDate", content) FROM stdin;
\.


--
-- Data for Name: questions; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY questions (id, question, "correctAnswer", duration, "examTypeId") FROM stdin;
\.


--
-- Data for Name: ratings; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY ratings (id, "courseId", stars) FROM stdin;
1	1	4
\.


--
-- Data for Name: sems; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY sems (id, "personalName", "personalSurname", email, telephone, "universityId", "createdDate", "updatedDate") FROM stdin;
\.


--
-- Data for Name: tags; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY tags (id, "lessonId", name) FROM stdin;
\.


--
-- Data for Name: universities; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY universities (id, name, "cityId") FROM stdin;
\.


--
-- Data for Name: userDetails; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "userDetails" ("userId", age, phone, "typeId", "occupationId", "educationId", "fbUserName", "twUserName", about, "profileImageURL", "tcNo", address, gender, id) FROM stdin;
1	24	5532504972	2	1	2	bekirsevki	SevkiBekir	ODTÜ	#	12345678912	Ereğli	E	1
\.


--
-- Data for Name: userTypes; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY "userTypes" (id, name) FROM stdin;
1	Kullanıcı
2	Eğitmen
3	Admin
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY users (id, firstname, lastname, email, password, "createdDate", "updatedDate", username) FROM stdin;
1	a	b	a@a.com	c4ca4238a0b923820dcc509a6f75849b	\N	\N	a
2	User	Last	user@user.com	c4ca4238a0b923820dcc509a6f75849b	\N	\N	user
\.


--
-- Data for Name: views; Type: TABLE DATA; Schema: eLearningProject; Owner: postgres
--

COPY views (id, "viewerId", "documentId") FROM stdin;
\.


SET search_path = public, pg_catalog;

--
-- Name: bills_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bills_id_seq', 1, false);


--
-- Name: catagories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('catagories_id_seq', 2, true);


--
-- Name: chapters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('chapters_id_seq', 4, true);


--
-- Name: cities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cities_id_seq', 1, false);


--
-- Name: comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('comments_id_seq', 1, false);


--
-- Name: coursedetails_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('coursedetails_id_seq', 1, true);


--
-- Name: courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('courses_id_seq', 1, true);


--
-- Name: coursetouser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('coursetouser_id_seq', 1, false);


--
-- Name: discussions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('discussions_id_seq', 1, false);


--
-- Name: documents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('documents_id_seq', 1, false);


--
-- Name: documenttypes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('documenttypes_id_seq', 1, true);


--
-- Name: eLearningProject.IPTables_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.IPTables_id_sequence"', 1, false);


--
-- Name: eLearningProject.bills_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.bills_id_sequence"', 1, false);


--
-- Name: eLearningProject.catagories_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.catagories_id_sequence"', 1, false);


--
-- Name: eLearningProject.chapters_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.chapters_id_sequence"', 1, false);


--
-- Name: eLearningProject.cities_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.cities_id_sequence"', 1, false);


--
-- Name: eLearningProject.comments_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.comments_id_sequence"', 1, false);


--
-- Name: eLearningProject.courseDetails_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.courseDetails_id_sequence"', 1, false);


--
-- Name: eLearningProject.courseToUser_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.courseToUser_id_sequence"', 1, false);


--
-- Name: eLearningProject.courses_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.courses_id_sequence"', 1, false);


--
-- Name: eLearningProject.discussions_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.discussions_id_sequence"', 1, false);


--
-- Name: eLearningProject.documentTypes_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.documentTypes_id_sequence"', 1, false);


--
-- Name: eLearningProject.educationLevels_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.educationLevels_id_sequence"', 1, false);


--
-- Name: eLearningProject.examProcess_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.examProcess_id_sequence"', 1, false);


--
-- Name: eLearningProject.examTypes_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.examTypes_id_sequence"', 1, false);


--
-- Name: eLearningProject.exams_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.exams_id_sequence"', 1, false);


--
-- Name: eLearningProject.lessonLegends_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.lessonLegends_id_sequence"', 1, false);


--
-- Name: eLearningProject.lessonProgress_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.lessonProgress_id_sequence"', 1, false);


--
-- Name: eLearningProject.lessons_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.lessons_id_sequence"', 1, false);


--
-- Name: eLearningProject.occupations_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.occupations_id_sequence"', 1, false);


--
-- Name: eLearningProject.paymentProcess_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.paymentProcess_id_sequence"', 1, false);


--
-- Name: eLearningProject.posts_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.posts_id_sequence"', 1, false);


--
-- Name: eLearningProject.questions_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.questions_id_sequence"', 1, false);


--
-- Name: eLearningProject.ratings_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.ratings_id_sequence"', 1, false);


--
-- Name: eLearningProject.sems_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.sems_id_sequence"', 1, false);


--
-- Name: eLearningProject.tags_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.tags_id_sequence"', 1, false);


--
-- Name: eLearningProject.universities_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.universities_id_sequence"', 1, false);


--
-- Name: eLearningProject.userTypes_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.userTypes_id_sequence"', 1, false);


--
-- Name: eLearningProject.users_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.users_id_sequence"', 1, false);


--
-- Name: eLearningProject.views_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"eLearningProject.views_id_sequence"', 1, false);


--
-- Name: educationlevels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('educationlevels_id_seq', 3, true);


--
-- Name: examprocess_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('examprocess_id_seq', 1, false);


--
-- Name: exams_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('exams_id_seq', 1, false);


--
-- Name: examtypes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('examtypes_id_seq', 1, false);


--
-- Name: iptables_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('iptables_id_seq', 1, false);


--
-- Name: lessonlegends_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('lessonlegends_id_seq', 3, true);


--
-- Name: lessonprogress_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('lessonprogress_id_seq', 8, true);


--
-- Name: lessons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('lessons_id_seq', 8, true);


--
-- Name: links_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('links_id_seq', 95, true);


--
-- Name: occupations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('occupations_id_seq', 2, true);


--
-- Name: paymentprocess_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paymentprocess_id_seq', 1, false);


--
-- Name: posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('posts_id_seq', 1, false);


--
-- Name: questions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('questions_id_seq', 1, false);


--
-- Name: ratings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ratings_id_seq', 1, true);


--
-- Name: sems_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sems_id_seq', 1, false);


--
-- Name: tags_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tags_id_seq', 1, false);


--
-- Name: universities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('universities_id_seq', 1, false);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_id_seq', 2, true);


--
-- Name: userdetails_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('userdetails_id_seq', 1, true);


--
-- Name: usertypes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usertypes_id_seq', 3, true);


--
-- Name: views_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('views_id_seq', 1, false);


SET search_path = "eLearningProject", pg_catalog;

--
-- Name: IPTables_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "IPTables"
    ADD CONSTRAINT "IPTables_pkey" PRIMARY KEY (id);


--
-- Name: bills_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY bills
    ADD CONSTRAINT bills_pkey PRIMARY KEY (id);


--
-- Name: catagories_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY catagories
    ADD CONSTRAINT catagories_pkey PRIMARY KEY (id);


--
-- Name: chapters_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY chapters
    ADD CONSTRAINT chapters_pkey PRIMARY KEY (id);


--
-- Name: cities_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY cities
    ADD CONSTRAINT cities_pkey PRIMARY KEY (id);


--
-- Name: comments_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- Name: courseDetails_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "courseDetails"
    ADD CONSTRAINT "courseDetails_pkey" PRIMARY KEY (id);


--
-- Name: courseToUser_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "courseToUser"
    ADD CONSTRAINT "courseToUser_pkey" PRIMARY KEY (id);


--
-- Name: courses_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (id);


--
-- Name: discussions_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY discussions
    ADD CONSTRAINT discussions_pkey PRIMARY KEY (id);


--
-- Name: documentTypes_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "documentTypes"
    ADD CONSTRAINT "documentTypes_pkey" PRIMARY KEY (id);


--
-- Name: documents_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY documents
    ADD CONSTRAINT documents_pkey PRIMARY KEY (id);


--
-- Name: educationLevels_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "educationLevels"
    ADD CONSTRAINT "educationLevels_pkey" PRIMARY KEY (id);


--
-- Name: examProcess_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "examProcess"
    ADD CONSTRAINT "examProcess_pkey" PRIMARY KEY (id);


--
-- Name: examTypes_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "examTypes"
    ADD CONSTRAINT "examTypes_pkey" PRIMARY KEY (id);


--
-- Name: exams_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY exams
    ADD CONSTRAINT exams_pkey PRIMARY KEY (id);


--
-- Name: lessonLegends_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "lessonLegends"
    ADD CONSTRAINT "lessonLegends_pkey" PRIMARY KEY (id);


--
-- Name: lessonProgress_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "lessonProgress"
    ADD CONSTRAINT "lessonProgress_pkey" PRIMARY KEY (id);


--
-- Name: lessons_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY lessons
    ADD CONSTRAINT lessons_pkey PRIMARY KEY (id);


--
-- Name: links_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY links
    ADD CONSTRAINT links_pkey PRIMARY KEY (id);


--
-- Name: occupations_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY occupations
    ADD CONSTRAINT occupations_pkey PRIMARY KEY (id);


--
-- Name: paymentProcess_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "paymentProcess"
    ADD CONSTRAINT "paymentProcess_pkey" PRIMARY KEY (id);


--
-- Name: posts_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id);


--
-- Name: questions_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (id);


--
-- Name: ratings_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY ratings
    ADD CONSTRAINT ratings_pkey PRIMARY KEY (id);


--
-- Name: sems_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY sems
    ADD CONSTRAINT sems_pkey PRIMARY KEY (id);


--
-- Name: tags_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY tags
    ADD CONSTRAINT tags_pkey PRIMARY KEY (id);


--
-- Name: universities_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY universities
    ADD CONSTRAINT universities_pkey PRIMARY KEY (id);


--
-- Name: userDetails_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "userDetails"
    ADD CONSTRAINT "userDetails_pkey" PRIMARY KEY (id);


--
-- Name: userTypes_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "userTypes"
    ADD CONSTRAINT "userTypes_pkey" PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: views_pkey; Type: CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY views
    ADD CONSTRAINT views_pkey PRIMARY KEY (id);


--
-- Name: ChapterId_examProcess; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "examProcess"
    ADD CONSTRAINT "ChapterId_examProcess" FOREIGN KEY ("chapterId") REFERENCES chapters(id);


--
-- Name: fCatagoryId_courses; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY courses
    ADD CONSTRAINT "fCatagoryId_courses" FOREIGN KEY ("catagoryId") REFERENCES catagories(id);


--
-- Name: fChapterId_exams; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY exams
    ADD CONSTRAINT "fChapterId_exams" FOREIGN KEY ("chapterId") REFERENCES chapters(id);


--
-- Name: fChapterId_lessons; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY lessons
    ADD CONSTRAINT "fChapterId_lessons" FOREIGN KEY ("chapterId") REFERENCES chapters(id);


--
-- Name: fCity_universities; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY universities
    ADD CONSTRAINT "fCity_universities" FOREIGN KEY ("cityId") REFERENCES cities(id);


--
-- Name: fCourseId_bill; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY bills
    ADD CONSTRAINT "fCourseId_bill" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_c2u; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "courseToUser"
    ADD CONSTRAINT "fCourseId_c2u" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_chapters; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY chapters
    ADD CONSTRAINT "fCourseId_chapters" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_comments; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT "fCourseId_comments" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_courseDetails; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "courseDetails"
    ADD CONSTRAINT "fCourseId_courseDetails" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_discussions; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY discussions
    ADD CONSTRAINT "fCourseId_discussions" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_doc; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY documents
    ADD CONSTRAINT "fCourseId_doc" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_links; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY links
    ADD CONSTRAINT "fCourseId_links" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_paymentProcess; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "paymentProcess"
    ADD CONSTRAINT "fCourseId_paymentProcess" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fCourseId_ratings; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY ratings
    ADD CONSTRAINT "fCourseId_ratings" FOREIGN KEY ("courseId") REFERENCES courses(id);


--
-- Name: fDisscussionId_posts; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT "fDisscussionId_posts" FOREIGN KEY ("discussionId") REFERENCES discussions(id);


--
-- Name: fDocumentId_v; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY views
    ADD CONSTRAINT "fDocumentId_v" FOREIGN KEY ("documentId") REFERENCES documents(id);


--
-- Name: fDocumentTypeId_doc; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY documents
    ADD CONSTRAINT "fDocumentTypeId_doc" FOREIGN KEY ("documentTypeId") REFERENCES "documentTypes"(id);


--
-- Name: fEducationLevelId_uD; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "userDetails"
    ADD CONSTRAINT "fEducationLevelId_uD" FOREIGN KEY ("educationId") REFERENCES "educationLevels"(id);


--
-- Name: fExamTypeId_questions; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT "fExamTypeId_questions" FOREIGN KEY ("examTypeId") REFERENCES "examTypes"(id);


--
-- Name: fInstructorId_courses; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY courses
    ADD CONSTRAINT "fInstructorId_courses" FOREIGN KEY ("instructorId") REFERENCES users(id);


--
-- Name: fInstructorId_exams; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY exams
    ADD CONSTRAINT "fInstructorId_exams" FOREIGN KEY ("questionId") REFERENCES questions(id);


--
-- Name: fLessenLegendId_lessonProgress; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "lessonProgress"
    ADD CONSTRAINT "fLessenLegendId_lessonProgress" FOREIGN KEY ("lessonLegendId") REFERENCES "lessonLegends"(id);


--
-- Name: fLessonId_doc; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY documents
    ADD CONSTRAINT "fLessonId_doc" FOREIGN KEY ("lessonId") REFERENCES lessons(id);


--
-- Name: fLessonId_lessonProgress; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "lessonProgress"
    ADD CONSTRAINT "fLessonId_lessonProgress" FOREIGN KEY ("lessonId") REFERENCES lessons(id);


--
-- Name: fLessonId_links; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY links
    ADD CONSTRAINT "fLessonId_links" FOREIGN KEY ("lessonId") REFERENCES lessons(id);


--
-- Name: fLessonId_t; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY tags
    ADD CONSTRAINT "fLessonId_t" FOREIGN KEY ("lessonId") REFERENCES lessons(id);


--
-- Name: fLessonTypeId_lessons; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY lessons
    ADD CONSTRAINT "fLessonTypeId_lessons" FOREIGN KEY ("typeId") REFERENCES "documentTypes"(id);


--
-- Name: fOccupationId_uD; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "userDetails"
    ADD CONSTRAINT "fOccupationId_uD" FOREIGN KEY ("occupationId") REFERENCES occupations(id);


--
-- Name: fUniversity_sems; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY sems
    ADD CONSTRAINT "fUniversity_sems" FOREIGN KEY ("universityId") REFERENCES universities(id);


--
-- Name: fUserId_IP; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "IPTables"
    ADD CONSTRAINT "fUserId_IP" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_bill; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY bills
    ADD CONSTRAINT "fUserId_bill" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_c2u; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "courseToUser"
    ADD CONSTRAINT "fUserId_c2u" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_comments; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT "fUserId_comments" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_discussions; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY discussions
    ADD CONSTRAINT "fUserId_discussions" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_examProcess; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "examProcess"
    ADD CONSTRAINT "fUserId_examProcess" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_lessonProgress; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "lessonProgress"
    ADD CONSTRAINT "fUserId_lessonProgress" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_paymentProcess; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "paymentProcess"
    ADD CONSTRAINT "fUserId_paymentProcess" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_posts; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT "fUserId_posts" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserId_uD; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "userDetails"
    ADD CONSTRAINT "fUserId_uD" FOREIGN KEY ("userId") REFERENCES users(id);


--
-- Name: fUserTypeId_uD; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY "userDetails"
    ADD CONSTRAINT "fUserTypeId_uD" FOREIGN KEY ("typeId") REFERENCES "userTypes"(id);


--
-- Name: fViewerId_v; Type: FK CONSTRAINT; Schema: eLearningProject; Owner: postgres
--

ALTER TABLE ONLY views
    ADD CONSTRAINT "fViewerId_v" FOREIGN KEY ("viewerId") REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

