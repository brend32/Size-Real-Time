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
  "ff" 'ddd'
 }
```

<br>

# Методы (Functions)
***
## Список (List)
***
  * [СonnectObjects](#connectobjects) - _создание нужных объектов_<br>
  * [setTarget](#settarget) - _устанавливает цель на передаваемий объект_
  * [reloadObjects](#reloadobjects) - _применяет изменение в переменных класса или массиве_
## ConnectObjects()
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
## setTarget()
***
  Устанавливает цель на передаваемый `объект`, `на передаваемой форме(не обязательно)`, по его `id`.
  ```php 
  setTarget(string $object, [$form = null, $array = null]): return null
  ```
  
  > `$object` - `id` объекта<br>
    `$form` - `id` формы<br>
    `$array` - массив с `id` компонентов добавленых с помощью `ConnectObjects`
  
***
  Пример:
  ```php 
  use bundle\sizerealtime\sizerealtime;
  
  $SizeRealTime = new sizerealtime();
  $SizeRealTime->StartPosition = [0,0];
  $SizeRealTime->setTarget($e->sender->id);
  ```
***

## reloadObjects()
***
  Применяет изменение в переменных класса или массиве.
  ```php 
  reloadObjects([$changeColor = true, $changeblockedSizerColor = true, $changeSetka = true, $changeObjects = false, $changeFromArray = false, $array = null]): return null
  ```
  
  > `$changeColor` - изменять цвет `да` или `нет`<br>
    `$changeblockedSizerColor` - изменять цвет заблокированных квадратов `да` или `нет`<br>
	`$changeSetka` - изменять сетку `да` или `нет`<br>
	`$changeObjects` - без следующего параметра бесполезна<br>
	`$changeFromArray` - применить изменения в переменных класса для объектов из массива `да` или `нет`<br>
    `$array` - массив с `id` компонентов добавленных с помощью `ConnectObjects`
  
***
  Пример:
  ```php 
  use bundle\sizerealtime\sizerealtime;
  
  $SizeRealTime = new sizerealtime();
  //Подготовка
  $SizeRealTime->color = red;
  $SizeRealTime->colorPanel = yellow;
  $SizeRealTime->blockedSizerColor = blue;
  $SizeRealTime->setka = [5,5];// [x, y]
  //---------------------------------
  $SizeRealTime->reloadObjects(1,1,0);//изминение цветов
  $SizeRealTime->reloadObjects(0,0,1);//изминение сетки
  
  ```

