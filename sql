# Напишите запрос, который выберет имя пользователя (bids.name) с самой высокой ценой заявки (bids.price).
select name, price from bids order by price desc limit 1;
select name, price from bids where price in (select max(price) from bids);

# Напишите запрос, который выберет название мероприятия (events.caption), по которому нет заявок.
select e.caption from events e
join bids b on e.id not in (select event_id from bids)
group by e.caption;

select b.event_id as id, e.caption from events e
left join bids b on e.id = b.event_id
where b.event_id is null;

# Напишите запрос, который выберет название мероприятия (events.caption), по которому больше трех заявок.
select e.caption, count(b.event_id) as count from events e
join bids b on e.id = b.event_id
group by b.event_id
having count > 3
order by count desc;

# Напишите запрос, который выберет название мероприятия (events.caption), по которому больше всего заявок.
select e.caption, count(b.event_id) as count from events e
join bids b on e.id = b.event_id
group by b.event_id
limit 1;
