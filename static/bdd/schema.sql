drop table if exists entries;
create table articles (
  id integer primary key autoincrement,
  title text not null,
  text text not null,
  date date not null,
  auth text not null
);
