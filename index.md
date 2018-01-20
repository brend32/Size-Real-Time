# Size-Real-Time
Расширение для DN для изменения размеров объектов в реальном времени<br>

Самая новая версия  - `0.4`<br>
<br>
## Versions
 * `v 0.4` - [Документация](versions/v0.4/documentation), [Скачать](https://drive.google.com/open?id=1B5Bic6fJ_JK8n2ufGzDHS1zq2nInPfyu)
# Список изминений (Change list)
## v0.4
  * Добавлены 2 методы `blockedSizers`, `onlyDragging`
  * Добавлено 2 константы `VERSION`, `DEVELOPER`
  * Чтобы получить название расширения делаем из класса строку например: 
  ```php
  $sizerealtime = new sizerealtime();
  alert($sizerealtime);
  ```
  * Если неправильно написан метод он всегда будет возращать такой текст: "Метода "{$name}" - не существует!"
  * Добавлено свойство `blockedSizerColor`
  * Были исправлены погрешности в описании
 
