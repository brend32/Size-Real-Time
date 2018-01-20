# Документация v0.4
---------------
> **Актуально для v0.4**

<br>

## Подключение
Убедитесь что в коде присутствует такая срока:
```php
use bundle\sizerealtime\sizerealtime;
```
Для удобства можно сделать так:
```php
/**
 * @var sizerealtime
 */
 public $sizerealtime;
    
/**
 * @event construct 
 */
 function doConstruct(UXEvent $e = null)
 {   
  $this->sizerealtime = new sizerealtime();  
 }
```

<br>

## МЕТОДЫ
* ## Список
  * [**СonnectObjects**](#connectobjects)
* ## ConnectObjects
  Функция добавляет нужные объекты, `на передаваемую форму`,  и возвращает массив с их `id`.
  ```php 
  function
  ```
* ## ff
