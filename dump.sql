create table visit
(
    ip          bigint       not null,
    user_agent  varchar(255) not null,
    page_url    varchar(255) not null,
    view_date   datetime     not null,
    views_count int          not null,
    constraint idx_unique_visit
        unique (ip, page_url, user_agent)
);
INSERT INTO infusemedia.visit (ip, user_agent, page_url, view_date, views_count) VALUES (2887254017, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'http://localhost:3100/index1.html', '2023-05-22 04:31:31', 4);
INSERT INTO infusemedia.visit (ip, user_agent, page_url, view_date, views_count) VALUES (2887254017, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.3 Safari/605.1.15', 'http://localhost:3100/index1.html', '2023-05-22 04:31:56', 3);
INSERT INTO infusemedia.visit (ip, user_agent, page_url, view_date, views_count) VALUES (2887254017, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'http://localhost:3100/index2.html', '2023-05-22 04:31:19', 6);
INSERT INTO infusemedia.visit (ip, user_agent, page_url, view_date, views_count) VALUES (2887254017, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.3 Safari/605.1.15', 'http://localhost:3100/index2.html', '2023-05-22 04:31:43', 2);
