# Документация v0.4
---------------
> **Актуально для v0.4**

<br>

## Подключение (Conect)
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

# Методы (Functions)
* ## Список (List)
  * **[СonnectObjects](#connectobjects)**
* ## ConnectObjects()
  Функция добавляет нужные объекты, `на передаваемую форму`,  и возвращает массив с их `id`.
  ```php 
  ConnectObjects(string $formName): return array
  ```
  Пример:
  ```php 
  use bundle\sizerealtime\sizerealtime;
  
  $SizeRealTime = new sizerealtime();
  $formName = $this->getContextFormName();
  $SizeRealTime->ConnectObjects($formName);
  ```
* ## ff
