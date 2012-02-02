drop sequence if exists guid cascade;
create sequence guid;

drop type if exists user_roles cascade;
create type user_roles as enum('admin', 'main_client', 'sub_client');

drop table if exists users cascade;
create table users(
  id int primary key default nextval('guid'),

  role user_roles not null,
  username varchar(255) not null unique,
  password_hash varchar(255) not null,
  password_salt varchar(255) not null,
  active boolean not null default false,
  force_password_change boolean not null default false,

  title varchar(255) not null,
  first_name varchar(255) not null,
  last_name varchar(255) not null,
  email varchar(255) not null,
  phone varchar(255) not null,
  currency varchar(255) not null,

  company_name varchar(255) not null,
  company_address1 varchar(255) not null,
  company_address2 varchar(255) not null,
  company_phone varchar(255) not null,
  company_website varchar(255) not null,

  parent_client_id int references users(id),

  created_by int references users(id),
  created_at timestamp with time zone default current_timestamp
);

drop table if exists genres cascade;
create table genres(
  id int primary key default nextval('guid'),
  name varchar(255) not null,
  parent_id int null references genres(id),
  created_at timestamp with time zone default current_timestamp
);

drop table if exists videos cascade;
create table videos(
  id int primary key default nextval('guid'),
  user_id int not null references users(id),
  
  -- Product/Content:
  title varchar(255) not null,
  title_original varchar(255),
  episode varchar(255),
  episode_title varchar(255),
  episode_number smallint,
  season_number smallint,
  -- country
  -- original spoken_language not null
  -- subtitle not null
  -- production number
  production_year smallint not null,
  broadcast_date date,
  theatrical_release_date date,
  synopsis text,
  short_synopsis varchar(255) not null,
  star_rating smallint,
  primary_genre int not null references genres(id),
  secondary_genre int references genres(id),
  
  -- Material:
  file_name varchar(255),
  format varchar(255),
  container varchar(255) not null,
  run_time time without time zone,
  display_run_time time without time zone,
  chapter_number smallint,
  chapter_title varchar(255),
  chapter_timecode time without time zone,
  encoding_type varchar(255),
  bit_rate varchar(255),
  copy_protection boolean,
  content_file_size varchar(255),
  content_checksum varchar(255),
  
  -- Sales Information:
  rating_gas varchar(255) not null,
  rating_ch varchar(255),
  rating_at varchar(255),
  rating_reason varchar(255),
  provider varchar(255),
  isan int,
  upc_ean int,
  amd_ig int,
  article_number_vod int,
  production_company varchar(255) not null,
  copyright varchar(255),
  subtype varchar(255),
  -- sales_territory
  -- contract_id
  label_code int not null,
  channel_name varchar(255),
  -- wholesale_price_tier
  vendor_id varchar(255),
  sales_start_date date,
  preorder_sales_start_date date,
  sales_end_date date,
  vod_type varchar(255),
  available_for_vod date not null,
  unavailable_for_vod date,
  cleared_for_sale boolean not null,
  cleared_for_sale_hd boolean not null,
  cleared_for_vod boolean not null,
  cleared_for_vod_hd boolean not null,
  physical_release_date date,
  content_tags varchar(255),
  
  -- Assets:
  image_aspect_ratio varchar(255),
  extra_data_1 text,
  extra_data_2 text,
  extra_data_3 text,
  
  -- Transactional:
  uploaded_at timestamp with time zone default current_timestamp,
  -- runtime int,
  source_file varchar(255),
  source_duration int,
  source_size int,
  tm_file varchar(255),
  -- format varchar(255),
  transcode_start timestamp with time zone,
  transcode_end timestamp with time zone,
  trasncode_length int,
  transcode_status varchar(255) not null,

  created_at timestamp with time zone default current_timestamp,
  deleted_at timestamp with time zone
);

drop table if exists video_genres cascade;
create table video_genres(
  id int primary key default nextval('guid'),

  video_id int not null references videos(id),
  genre_id int not null references genres(id),

  created_at timestamp with time zone default current_timestamp
);

-- used to store: director, producer, actor, cast and screen_writer
drop table if exists video_personnel cascade;
create table video_personnel(
  id int primary key default nextval('guid'),
  
  video_id int not null references videos(id),
  occupation varchar(255),
  name varchar(255),
  
  created_at timestamp with time zone default current_timestamp
);

-- used to store: cover, trailer, picture, interview and making_of
drop table if exists video_assets cascade;
create table video_assets(
  id int primary key default nextval('guid'),
  
  video_id int not null references videos(id),
  type varchar(255),
  file_name varchar(255),
  
  created_at timestamp with time zone default current_timestamp
);

drop table if exists audio_files cascade;
create table audio_files(
  id int primary key default nextval('guid'),
  
  video_id int not null references videos(id),
  language_track varchar(255) not null,
  mix varchar(255) not null,
  type varchar(255) not null,
  channel varchar(255),
  note varchar(255),
  
  created_at timestamp with time zone default current_timestamp
);

drop table if exists ftp_profiles cascade;
create table ftp_profiles(
  id int primary key default nextval('guid'),
  user_id int not null references users(id),

  name varchar(255) not null,
  server varchar(255) not null,
  port smallint not null default 21,
  username varchar(255) not null,
  password varchar(255) not null,

  type user_roles not null, -- Why did I add this field?
  active boolean not null default false,
  public boolean not null default false,

  created_at timestamp with time zone default current_timestamp
);

drop table if exists tm_profiles cascade;
create table tm_profiles(
  id int primary key default nextval('guid'),

  name varchar(255) not null,
  ftp_profile_id int not null references ftp_profiles(id),

  created_at timestamp with time zone default current_timestamp
);

drop table if exists notifications cascade;
create table notifications(
  id int primary key default nextval('guid'),

  video_id int not null references videos(id),
  error_message varchar(255),

  created_at timestamp with time zone default current_timestamp
);

drop table if exists metadata_groups cascade;
create table metadata_groups(
  id int primary key default nextval('guid'),
  user_id int not null references users(id),
  name varchar(255) not null,
  created_at timestamp with time zone default current_timestamp
);

drop table if exists metadata_fields cascade;
create table metadata_fields(
  id int primary key default nextval('guid'),

  metadata_group_id int not null references metadata_groups(id),
  name varchar(255) not null,
  widget varchar(255) not null,
  data_type varchar(255),

  created_at timestamp with time zone default current_timestamp
);

drop table if exists metadata_field_values cascade;
create table metadata_field_values(
  id int primary key default nextval('guid'),

  metadata_field_id int not null references metadata_fields(id),
  value text not null,

  created_at timestamp with time zone default current_timestamp
);

drop table if exists video_metadata_values cascade;
create table video_metadata_values(
  id int primary key default nextval('guid'),

  video_id int not null references videos(id),
  metadata_field_id int not null references metadata_fields(id),
  metadata_field_value_id int references metadata_field_values(id) default null,
  value text default null,

  created_at timestamp with time zone default current_timestamp
);
