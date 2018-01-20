# Документация v0.4
---------------
> **Актуально для v0.4**

<br>

## Подключение (Conect)
Убедитесь что в коде присутствует такая срока:
```php
use bundle\sizerealtime\sizerealtime;
```
***
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
***
* ## Список (List)
***
  * [СonnectObjects](#connectobjects) - _создание нужных объектов_
* ## ConnectObjects()
***
  Добавляет нужные объекты, `на передаваемую форму`,  и возвращает массив с их `id`.
  ```php 
  ConnectObjects(string $formName): return array
  ```
  
  > `$formName` - название формы
  
***
  Пример:
  ```php 
  use bundle\sizerealtime\sizerealtime;
  
  $SizeRealTime = new sizerealtime();
  $formName = $this->getContextFormName();
  $SizeRealTime->ConnectObjects($formName);
  ```
  ***
* ## setTarget()
***
  Устанавливает цель на передаваемый `объект`, `на передаваемой форме(не обязательно)`, по его `id`.
  ```php 
  setTarget(string $object, [$form = null, $array = null]): return null
  ```
  
  > `$object` - `id` объекта
    `$form` - `id` формы
    `$array` - массив с `id` компонентов добавленых с помощью `ConnectObjects`
  
***
  Пример:
  ```php 
  use bundle\sizerealtime\sizerealtime;
  
  $SizeRealTime = new sizerealtime();
  $formName = $this->getContextFormName();
  $SizeRealTime->ConnectObjects($formName);
  ```
  ***
