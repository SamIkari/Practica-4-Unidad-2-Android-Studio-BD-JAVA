PGDMP     !                
    |            info_idgs101d    15.2    15.2     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    91427    info_idgs101d    DATABASE     �   CREATE DATABASE info_idgs101d WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Mexico.1252';
    DROP DATABASE info_idgs101d;
                postgres    false            �            1259    91429    informacion    TABLE     �  CREATE TABLE public.informacion (
    pk_informacion integer NOT NULL,
    nombres character varying(50) NOT NULL,
    primer_apellido character varying(50) NOT NULL,
    segundo_apellido character varying(50) NOT NULL,
    edad integer NOT NULL,
    fecha_nacimiento date NOT NULL,
    hora time without time zone NOT NULL,
    fecha_registro date NOT NULL,
    estado integer DEFAULT 1
);
    DROP TABLE public.informacion;
       public         heap    postgres    false            �            1259    91428    informacion_pk_informacion_seq    SEQUENCE     �   CREATE SEQUENCE public.informacion_pk_informacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.informacion_pk_informacion_seq;
       public          postgres    false    215            �           0    0    informacion_pk_informacion_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.informacion_pk_informacion_seq OWNED BY public.informacion.pk_informacion;
          public          postgres    false    214            e           2604    91432    informacion pk_informacion    DEFAULT     �   ALTER TABLE ONLY public.informacion ALTER COLUMN pk_informacion SET DEFAULT nextval('public.informacion_pk_informacion_seq'::regclass);
 I   ALTER TABLE public.informacion ALTER COLUMN pk_informacion DROP DEFAULT;
       public          postgres    false    215    214    215            �          0    91429    informacion 
   TABLE DATA           �   COPY public.informacion (pk_informacion, nombres, primer_apellido, segundo_apellido, edad, fecha_nacimiento, hora, fecha_registro, estado) FROM stdin;
    public          postgres    false    215   �                   0    0    informacion_pk_informacion_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.informacion_pk_informacion_seq', 4, true);
          public          postgres    false    214            h           2606    91435    informacion informacion_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.informacion
    ADD CONSTRAINT informacion_pkey PRIMARY KEY (pk_informacion);
 F   ALTER TABLE ONLY public.informacion DROP CONSTRAINT informacion_pkey;
       public            postgres    false    215            �   h   x�3��)�,�L��M��L�42�4404�"CNS+K+CN##]CC]�4�a-&ƨZ�Z*�i15�22B�b�YPT����`\4�fV��V�zc���� �N/B     