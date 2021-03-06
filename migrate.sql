-- Rolling back: 2020_12_04_085113_create_customer_ship_table;
drop table if exists `customer_ship`;
-- Rolling back: 2020_11_08_061657_create_payments_table;
drop table if exists `payments`;
-- Rolling back: 2020_11_08_054717_create_expenses_table;
drop table if exists `expenses`;
-- Rolling back: 2020_11_08_045156_create_parts_table;
drop table if exists `parts`;
-- Rolling back: 2020_10_28_120026_create_working_details_table;
drop table if exists `working_details`;
-- Rolling back: 2020_10_26_111910_create_consumption_taxes_table;
drop table if exists `consumption_taxes`;
-- Rolling back: 2020_10_26_085607_create_bases_table;
drop table if exists `bases`;
-- Rolling back: 2020_10_26_030515_create_quotations_table;
drop table if exists `quotations`;
-- Rolling back: 2020_10_24_085358_create_ship_special_names_table;
drop table if exists `ship_special_names`;
-- Rolling back: 2020_10_24_083459_create_limited_coastal_areas_table;
drop table if exists `limited_coastal_areas`;
-- Rolling back: 2020_10_24_075914_create_estimated_delivery_places_table;
drop table if exists `estimated_delivery_places`;
-- Rolling back: 2020_10_24_074952_create_estimated_payment_terms_table;
drop table if exists `estimated_payment_terms`;
-- Rolling back: 2020_10_24_073049_create_estimated_delivery_dates_table;
drop table if exists `estimated_delivery_dates`;
-- Rolling back: 2020_10_24_063229_create_postal_codes_table;
drop table if exists `postal_codes`;
-- Rolling back: 2020_10_24_052156_create_sales_categories_table;
drop table if exists `sales_categories`;
-- Rolling back: 2020_10_24_050609_create_type_classifications_table;
drop table if exists `type_classifications`;
-- Rolling back: 2020_10_24_045235_create_storage_marinas_table;
drop table if exists `storage_marinas`;
-- Rolling back: 2020_10_24_042205_create_engine_model_lists_table;
drop table if exists `engine_model_lists`;
-- Rolling back: 2020_10_24_025116_create_sales_company_classifications_table;
drop table if exists `sales_company_classifications`;
-- Rolling back: 2020_10_23_055540_create_sales_table;
drop table if exists `sales`;
-- Rolling back: 2020_10_20_080903_create_ships_table;
drop table if exists `ships`;
-- Rolling back: 2020_10_14_084158_create_customers_table;
drop table if exists `customers`;
-- Rolling back: 2020_10_13_082842_create_job_titles_table;
drop table if exists `job_titles`;
-- Rolling back: 2020_10_13_032451_create_sales_in_charges_table;
drop table if exists `sales_in_charges`;
-- Rolling back: 2020_10_12_104831_create_boat_type_masters_table;
drop table if exists `boat_type_masters`;
-- Rolling back: 2020_10_12_084933_create_use_ships_table;
drop table if exists `use_ships`;
-- Rolling back: 2020_10_12_084343_create_ship_types_table;
drop table if exists `ship_types`;
-- Rolling back: 2020_10_12_084008_create_navigation_areas_table;
drop table if exists `navigation_areas`;
-- Rolling back: 2020_10_12_040918_create_expense_details_table;
drop table if exists `expense_details`;
-- Rolling back: 2020_10_12_035703_create_outsourced_service_stores_table;
drop table if exists `outsourced_service_stores`;
-- Rolling back: 2020_10_12_033913_create_service_in_charges_table;
drop table if exists `service_in_charges`;
-- Rolling back: 2019_08_19_000000_create_failed_jobs_table;
drop table if exists `failed_jobs`;
-- Rolling back: 2014_10_12_100000_create_password_resets_table;
drop table if exists `password_resets`;
-- Rolling back: 2014_10_12_000000_create_users_table;
drop table if exists `users`;
create table `users` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(191) not null, `email` varchar(191) not null, `email_verified_at` timestamp null, `password` varchar(191) not null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `users` add unique `users_email_unique`(`email`);
create table `password_resets` (`email` varchar(191) not null, `token` varchar(191) not null, `created_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `password_resets` add index `password_resets_email_index`(`email`);
create table `failed_jobs` (`id` bigint unsigned not null auto_increment primary key, `uuid` varchar(191) not null, `connection` text not null, `queue` text not null, `payload` longtext not null, `exception` longtext not null, `failed_at` timestamp default CURRENT_TIMESTAMP not null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `failed_jobs` add unique `failed_jobs_uuid_unique`(`uuid`);
create table `service_in_charges` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `outsourced_service_stores` (`id` bigint unsigned not null auto_increment primary key, `code` varchar(191) not null, `cost_rate` int not null, `order` int not null, `name` varchar(191) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `expense_details` (`id` bigint unsigned not null auto_increment primary key, `expense_detail` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `navigation_areas` (`id` bigint unsigned not null auto_increment primary key, `area_name` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `ship_types` (`id` bigint unsigned not null auto_increment primary key, `ship_type` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `use_ships` (`id` bigint unsigned not null auto_increment primary key, `usage_name` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `boat_type_masters` (`id` bigint unsigned not null auto_increment primary key, `boat_type_selection` varchar(191) not null, `extracted_data` varchar(191) not null, `name` varchar(191) not null, `product_code` varchar(191) not null, `bu_classification` varchar(191) not null, `class` varchar(191) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `sales_in_charges` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `job_titles` (`id` bigint unsigned not null auto_increment primary key, `role_name` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `customers` (`id` bigint unsigned not null auto_increment primary key, `sales_in_charge_id` bigint unsigned null, `job_title_id` bigint unsigned null, `name` varchar(191) null, `kana` varchar(191) null, `company_id` bigint unsigned null, `user_code` varchar(191) null, `postal_code` varchar(191) null, `address1` varchar(191) null, `address2` varchar(191) null, `home_tel` varchar(191) null, `tel` varchar(191) null, `dm_issuance_cla` varchar(191) null, `registered_date` date null, `is_company` tinyint(1) not null default '0', `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `customers` add constraint `customers_sales_in_charge_id_foreign` foreign key (`sales_in_charge_id`) references `sales_in_charges` (`id`);
alter table `customers` add constraint `customers_job_title_id_foreign` foreign key (`job_title_id`) references `job_titles` (`id`);
alter table `customers` add constraint `customers_company_id_foreign` foreign key (`company_id`) references `customers` (`id`);
create table `ships` (`id` bigint unsigned not null auto_increment primary key, `ship_type_id` bigint unsigned null, `boat_type_master_id` bigint unsigned null, `use_id` bigint unsigned null, `navigation_area_id` bigint unsigned null, `name` varchar(191) not null, `certificate_num` varchar(191) null, `inspection_num` varchar(191) null, `delivery_date` varchar(191) null, `gross_register_tonn` int null, `model` varchar(191) null, `machine_num` varchar(191) null, `registration_port` varchar(191) null, `length` int null, `passengers_max_num` int null, `other_passengers_max_num` int null, `sailors_max_num` int null, `boat_no` varchar(191) null, `registered_date` date null, `inspection_id` varchar(191) null, `other_navigational_conditions` varchar(191) null, `engine` varchar(191) null, `engine_num_l` varchar(191) null, `engine_num_r` varchar(191) null, `location` varchar(191) null, `inspection_date` date null, `inspection_date1` date null, `inspection_date2` date null, `inspection_date3` date null, `inspection_date4` date null, `inspection_date5` date null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `ships` add constraint `ships_ship_type_id_foreign` foreign key (`ship_type_id`) references `ship_types` (`id`);
alter table `ships` add constraint `ships_boat_type_master_id_foreign` foreign key (`boat_type_master_id`) references `boat_type_masters` (`id`);
alter table `ships` add constraint `ships_use_id_foreign` foreign key (`use_id`) references `use_ships` (`id`);
alter table `ships` add constraint `ships_navigation_area_id_foreign` foreign key (`navigation_area_id`) references `navigation_areas` (`id`);
create table `sales` (`id` bigint unsigned not null auto_increment primary key, `customer_id` bigint unsigned null, `company_id` bigint unsigned null, `ship_id` bigint unsigned null, `sales_in_charge_id` bigint unsigned null, `service_in_charge_id` bigint unsigned null, `service_store_id` bigint unsigned null, `expense_detail_id` bigint unsigned null, `request_details` varchar(191) null, `file_no` int null, `discount` int null, `request_amount` varchar(191) null, `created_date` date null, `due_date` date null, `usage_time` varchar(191) null, `sales_date` date null, `delivery_date` date null, `travel_expense` int null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `sales` add constraint `sales_customer_id_foreign` foreign key (`customer_id`) references `customers` (`id`);
alter table `sales` add constraint `sales_company_id_foreign` foreign key (`company_id`) references `customers` (`id`);
alter table `sales` add constraint `sales_ship_id_foreign` foreign key (`ship_id`) references `ships` (`id`);
alter table `sales` add constraint `sales_sales_in_charge_id_foreign` foreign key (`sales_in_charge_id`) references `sales_in_charges` (`id`);
alter table `sales` add constraint `sales_service_in_charge_id_foreign` foreign key (`service_in_charge_id`) references `service_in_charges` (`id`);
alter table `sales` add constraint `sales_service_store_id_foreign` foreign key (`service_store_id`) references `outsourced_service_stores` (`id`);
alter table `sales` add constraint `sales_expense_detail_id_foreign` foreign key (`expense_detail_id`) references `expense_details` (`id`);
create table `sales_company_classifications` (`id` bigint unsigned not null auto_increment primary key, `key` varchar(191) not null, `name` varchar(191) not null, `order` varchar(191) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `engine_model_lists` (`id` bigint unsigned not null auto_increment primary key, `model_selection` varchar(191) not null, `model` varchar(191) not null, `classification` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `storage_marinas` (`id` bigint unsigned not null auto_increment primary key, `storage_code` varchar(191) not null, `storage_location` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `type_classifications` (`id` bigint unsigned not null auto_increment primary key, `type_code` varchar(191) not null, `type_classification_contents` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `sales_categories` (`id` bigint unsigned not null auto_increment primary key, `code` varchar(191) not null, `sales_details` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `postal_codes` (`id` bigint unsigned not null auto_increment primary key, `postal_code` varchar(191) not null, `pref_name` varchar(191) not null, `city_name` varchar(191) not null, `town_name` varchar(191) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `estimated_delivery_dates` (`id` bigint unsigned not null auto_increment primary key, `delivery_date` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `estimated_payment_terms` (`id` bigint unsigned not null auto_increment primary key, `payment_terms` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `estimated_delivery_places` (`id` bigint unsigned not null auto_increment primary key, `delivery_place` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `limited_coastal_areas` (`id` bigint unsigned not null auto_increment primary key, `code` varchar(191) not null, `area_name` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `ship_special_names` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(191) not null, `order` int not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `quotations` (`id` bigint unsigned not null auto_increment primary key, `customer_id` bigint unsigned null, `company_id` bigint unsigned null, `ship_id` bigint unsigned null, `delivery_date_id` bigint unsigned null, `delivery_place_id` bigint unsigned null, `payment_terms_id` bigint unsigned null, `expense_detail_id` bigint unsigned null, `user_code` varchar(191) null, `hull_num` varchar(191) null, `discount` int null, `estimate_num` varchar(191) null, `estimate_date` date null, `expiration_date` date null, `estimated_amount` varchar(191) null, `estimated_subject` varchar(191) null, `created_date` date null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `quotations` add constraint `quotations_customer_id_foreign` foreign key (`customer_id`) references `customers` (`id`);
alter table `quotations` add constraint `quotations_company_id_foreign` foreign key (`company_id`) references `customers` (`id`);
alter table `quotations` add constraint `quotations_ship_id_foreign` foreign key (`ship_id`) references `ships` (`id`);
alter table `quotations` add constraint `quotations_delivery_date_id_foreign` foreign key (`delivery_date_id`) references `estimated_delivery_dates` (`id`);
alter table `quotations` add constraint `quotations_delivery_place_id_foreign` foreign key (`delivery_place_id`) references `estimated_delivery_places` (`id`);
alter table `quotations` add constraint `quotations_payment_terms_id_foreign` foreign key (`payment_terms_id`) references `estimated_payment_terms` (`id`);
alter table `quotations` add constraint `quotations_expense_detail_id_foreign` foreign key (`expense_detail_id`) references `expense_details` (`id`);
create table `bases` (`id` bigint unsigned not null auto_increment primary key, `store_code` varchar(191) not null, `store_name1` varchar(191) not null, `store_name2` varchar(191) not null, `address` varchar(191) not null, `postal_code` varchar(191) not null, `tel` varchar(191) not null, `fax` varchar(191) not null, `bank_name` varchar(191) not null, `account_name` varchar(191) not null, `account_number` varchar(191) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `consumption_taxes` (`id` bigint unsigned not null auto_increment primary key, `tax_rate` int unsigned not null, `date` datetime not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `working_details` (`id` bigint unsigned not null auto_increment primary key, `quotation_id` bigint unsigned null, `sales_id` bigint unsigned null, `content` varchar(191) null, `quantity` int null, `unit_price` int null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `working_details` add constraint `working_details_quotation_id_foreign` foreign key (`quotation_id`) references `quotations` (`id`);
alter table `working_details` add constraint `working_details_sales_id_foreign` foreign key (`sales_id`) references `sales` (`id`);
create table `parts` (`id` bigint unsigned not null auto_increment primary key, `quotation_id` bigint unsigned null, `sales_id` bigint unsigned null, `number` varchar(191) null, `name` varchar(191) null, `quantity` int null, `unit_price` int null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `parts` add constraint `parts_quotation_id_foreign` foreign key (`quotation_id`) references `quotations` (`id`);
alter table `parts` add constraint `parts_sales_id_foreign` foreign key (`sales_id`) references `sales` (`id`);
create table `expenses` (`id` bigint unsigned not null auto_increment primary key, `quotation_id` bigint unsigned null, `sales_id` bigint unsigned null, `content` varchar(191) null, `quantity` int null, `unit_price` int null, `expense_detail_id` bigint unsigned null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `expenses` add constraint `expenses_quotation_id_foreign` foreign key (`quotation_id`) references `quotations` (`id`);
alter table `expenses` add constraint `expenses_sales_id_foreign` foreign key (`sales_id`) references `sales` (`id`);
alter table `expenses` add constraint `expenses_expense_detail_id_foreign` foreign key (`expense_detail_id`) references `expense_details` (`id`);
create table `payments` (`id` bigint unsigned not null auto_increment primary key, `content` varchar(191) not null, `unit_price` varchar(191) not null, `quantity` varchar(191) not null, `total_price` varchar(191) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
create table `customer_ship` (`id` bigint unsigned not null auto_increment primary key, `customer_id` bigint unsigned not null, `ship_id` bigint unsigned not null, `is_owner` tinyint(1) not null default '0', `is_borrower` tinyint(1) not null default '0', `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table `customer_ship` add constraint `customer_ship_customer_id_foreign` foreign key (`customer_id`) references `customers` (`id`) on delete cascade;
alter table `customer_ship` add constraint `customer_ship_ship_id_foreign` foreign key (`ship_id`) references `ships` (`id`) on delete cascade;
