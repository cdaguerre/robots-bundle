## RobotsBundle

Add contextual robot meta headers.

### Installation

```sh
$ composer require cdaguerre/robots-bundle
```

### Configuration

```yml
dag_robots:
  rules:
    - { route: 'homepage', tags: ['noindex', 'nofollow'], hosts: ['www.example.com'] }
    - { route: 'product_show', tags: ['noindex', 'nofollow'], hosts: ['www.example1.com', 'www.example2.com'] }
    - { route: 'category_show', tags: ['noindex', 'nofollow'] }
```

### TODO

- [ ] Add route to serve robots.txt files dynamically.
- [ ] Add tests