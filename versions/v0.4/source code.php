<?php
namespace bundle\sizerealtime;
//namespace app\forms;
use app;
use gui;
use std;
use framework;
class sizerealtime{

    /**
     * --RU--
     * Цель
     * @var object 
     */
    public $target;
    
    /**
     * --RU--
     * @var UXRectangle
     */
    public $p1;
    
    /**
     * --RU--
     * @var UXRectangle 
     */
    public $p2;
    
    /**
     * --RU--
     * @var UXRectangle 
     */
    public $p3;
    
    /**
     * --RU--
     * @var UXRectangle 
     */
    public $p4;
    
    /**
     * --RU--
     * @var UXRectangle 
     */
    public $p5;
    
    /**
     * --RU--
      * @var UXRectangle
     */
    public $p6;
    
    /**
     * --RU--
     * @var UXRectangle
     */
    public $p7;
    
    /**
     * --RU--
     * @var UXRectangle 
     */
    public $p8;
    
    /**
     * --RU--
      * @var UXButton
     */
    public $but;
    
    /**
     * --RU--
     * Объект панель
     * @var UXPanel
     */
    public $panel;
    
    /**
     * --RU--
     * Путь к разделу реестра
     * @var int 
     */
    public $barier = 32;
    
    /**
     * --RU--
     * Сетка пиремищения
     * @var double[]
     */
    public $setka = [1,1];
    
    
    /**
     * --RU--
     * Минимальный размер
     * @var double[] 
     */
    public $minSize = [32,32];
    
    /**
     * --RU--
     * Начальная позиция
     * @var double[] 
     */
    public $StartPosition = [0,0];
    
    /**
     * --RU--
     * Цвет оконтовки панели и квадратов 
     * @var string 
     */
    public $color = black;
    
    /**
     * --RU--
     * Цвет заблокированого квадрата
     * @var string 
     */
    public $blockedSizerColor = gray;
    
    /**
     * --RU--
     * Цвет панели в момент таскания
     * @var string 
     */
    public $colorPanel = "#7d7d7d4e";
    
    /**
     * --RU--
     * Имя формы
     * @var string 
     */
    public $form;
    
     /**
     * --RU--
     * Id созданых объектов
     * @var array 
     */
    private $objects;
    
    /**
     * --RU--
     * Версия
     */
    const VERSION = "v0.4";
    
    /**
     * --RU--
     * Автор
     */
    const DEVELOPER = "BREND32 https://www.youtube.com/channel/UCATCV8pfte6-lyUy0sjGXUQ";
    
    public function __toString() {
		return "Size Real Time";
    }
    
    public function __call($name, $arguments) {
		return "Метода \"{$name}\" - не существует!";
    }
    
    /**
     * --RU--
     * Включить/выключить sizer(-s)(Квадрат(-ы) $p1,..,$p8)
     * @example
     * S - Show
     * E - Enable
     */
    public function blockedSizers($p1E = 0, $p1S = 1,$p2E = 0,$p2S = 1,$p3E = 0,$p3S = 1,$p4E = 0,$p4S = 1,$p5E = 0,$p5S = 1,$p6E = 0,$p6S = 1,$p7E = 0,$p7S = 1,$p8E = 0,$p8S = 1){
        app()->form($this->form)->{$this->objects[p1]}->visible = $p1S;
        app()->form($this->form)->{$this->objects[p2]}->visible = $p2S;
        app()->form($this->form)->{$this->objects[p3]}->visible = $p3S;
        app()->form($this->form)->{$this->objects[p4]}->visible = $p4S;
        app()->form($this->form)->{$this->objects[p5]}->visible = $p5S;
        app()->form($this->form)->{$this->objects[p6]}->visible = $p6S;
        app()->form($this->form)->{$this->objects[p7]}->visible = $p7S;
        app()->form($this->form)->{$this->objects[p8]}->visible = $p8S;
        
        app()->form($this->form)->{$this->objects[p1]}->dragging->enabled = $p1E;
        app()->form($this->form)->{$this->objects[p2]}->dragging->enabled = $p2E;
        app()->form($this->form)->{$this->objects[p3]}->dragging->enabled = $p3E;
        app()->form($this->form)->{$this->objects[p4]}->dragging->enabled = $p4E;
        app()->form($this->form)->{$this->objects[p5]}->dragging->enabled = $p5E;
        app()->form($this->form)->{$this->objects[p6]}->dragging->enabled = $p6E;
        app()->form($this->form)->{$this->objects[p7]}->dragging->enabled = $p7E;
        app()->form($this->form)->{$this->objects[p8]}->dragging->enabled = $p8E;
        
        for ($i = 0; $i <= 8; $i++)
        {
            if (${"p".$i."E"} == 0)
            {
                app()->form($this->form)->{$this->objects[p.$i]}->fillColor = UXColor::of($this->blockedSizerColor);
            }
            else 
            {
                app()->form($this->form)->{$this->objects[p.$i]}->fillColor = UXColor::of($this->color); 
            }
        }
    }
    
    /**
     * --RU--
     * Включить/выключить растягиваемасть цели 
     */
    public function onlyDragging(bool $onlyDragging = 0, bool $showSizers = 1){
        app()->form($this->form)->{$this->objects[p1]}->dragging->enabled = 
        app()->form($this->form)->{$this->objects[p2]}->dragging->enabled = 
        app()->form($this->form)->{$this->objects[p3]}->dragging->enabled = 
        app()->form($this->form)->{$this->objects[p4]}->dragging->enabled = 
        app()->form($this->form)->{$this->objects[p5]}->dragging->enabled = 
        app()->form($this->form)->{$this->objects[p6]}->dragging->enabled = 
        app()->form($this->form)->{$this->objects[p7]}->dragging->enabled = 
        app()->form($this->form)->{$this->objects[p8]}->dragging->enabled = !$onlyDragging;
        
        if ($onlyDragging)
        {
            app()->form($this->form)->{$this->objects[p1]}->fillColor = 
            app()->form($this->form)->{$this->objects[p2]}->fillColor = 
            app()->form($this->form)->{$this->objects[p3]}->fillColor = 
            app()->form($this->form)->{$this->objects[p4]}->fillColor = 
            app()->form($this->form)->{$this->objects[p5]}->fillColor = 
            app()->form($this->form)->{$this->objects[p6]}->fillColor = 
            app()->form($this->form)->{$this->objects[p7]}->fillColor = 
            app()->form($this->form)->{$this->objects[p8]}->fillColor = UXColor::of($this->blockedSizerColor);
        }
        else 
        {
            app()->form($this->form)->{$this->objects[p1]}->fillColor = 
            app()->form($this->form)->{$this->objects[p2]}->fillColor = 
            app()->form($this->form)->{$this->objects[p3]}->fillColor = 
            app()->form($this->form)->{$this->objects[p4]}->fillColor = 
            app()->form($this->form)->{$this->objects[p5]}->fillColor = 
            app()->form($this->form)->{$this->objects[p6]}->fillColor = 
            app()->form($this->form)->{$this->objects[p7]}->fillColor = 
            app()->form($this->form)->{$this->objects[p8]}->fillColor = UXColor::of($this->color); 
        }
        
        app()->form($this->form)->{$this->objects[p1]}->visible = 
        app()->form($this->form)->{$this->objects[p2]}->visible = 
        app()->form($this->form)->{$this->objects[p3]}->visible = 
        app()->form($this->form)->{$this->objects[p4]}->visible = 
        app()->form($this->form)->{$this->objects[p5]}->visible = 
        app()->form($this->form)->{$this->objects[p6]}->visible = 
        app()->form($this->form)->{$this->objects[p7]}->visible = 
        app()->form($this->form)->{$this->objects[p8]}->visible = $showSizers;
    }
    
    /**
     * --RU--
     * Включить/выключить ограничение перемещения 
     */
    public function limitedObjects(bool $limitedObjects = 0){
        app()->form($this->form)->{$this->objects[panel]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p1]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p2]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p3]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p4]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p5]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p6]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p7]}->dragging->limitedByParent =
        app()->form($this->form)->{$this->objects[p8]}->dragging->limitedByParent = $limitedObjects;
        
        app()->form($this->form)->{$this->objects[panel]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p1]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p2]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p3]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p4]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p5]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p6]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p7]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p8]}->dragging->enable();   
    }
    
    /**
     * --RU--
     * Применяет изменение в переменных класса или массиве
     * @example
     * Options:  reloadObjects([$changeColor = true, $changeblockedSizerColor = true,
     *  $changeSetka = true, $changeObjects = false,
     *  $changeFromArray = false,$array = null]);
     */
    public function reloadObjects($changeColor = true, $changeblockedSizerColor = true, $changeSetka = true, $changeObjects = false, $changeFromArray = false, $array = null){
    if ($changeFromArray == false)
        {
    if ($changeColor)
    {
        app()->form($this->form)->{$this->objects[p1]}->fillColor =
        app()->form($this->form)->{$this->objects[p2]}->fillColor =
        app()->form($this->form)->{$this->objects[p3]}->fillColor =
        app()->form($this->form)->{$this->objects[p4]}->fillColor =
        app()->form($this->form)->{$this->objects[p5]}->fillColor =
        app()->form($this->form)->{$this->objects[p6]}->fillColor =
        app()->form($this->form)->{$this->objects[p7]}->fillColor =
        app()->form($this->form)->{$this->objects[panel]}->borderColor =
        app()->form($this->form)->{$this->objects[p8]}->fillColor = UXColor::of($this->color);    
    } 
    
    if ($changeblockedSizerColor)
    {
        for ($i = 1; $i <= 8; $i++)
        {
            if (app()->form($this->form)->{$this->objects[p.$i]}->dragging->enabled == 0)
            {
                app()->form($this->form)->{$this->objects[p.$i]}->fillColor = UXColor::of($this->blockedSizerColor);
            }
        }
    }
    
    if ($changeSetka)
    {
        app()->form($this->form)->{$this->objects[panel]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p1]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p2]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p3]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p4]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p5]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p6]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p7]}->dragging->gridX =
        app()->form($this->form)->{$this->objects[p8]}->dragging->gridX = $this->setka[0];
        
        app()->form($this->form)->{$this->objects[panel]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p1]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p2]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p3]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p4]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p5]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p6]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p7]}->dragging->gridY =
        app()->form($this->form)->{$this->objects[p8]}->dragging->gridY = $this->setka[1];
        
        app()->form($this->form)->{$this->objects[panel]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p1]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p2]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p3]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p4]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p5]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p6]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p7]}->dragging->enable();
        app()->form($this->form)->{$this->objects[p8]}->dragging->enable();    
    }
      
    if ($changeObjects)
    {
        app()->form($this->form)->{$this->objects[panel]} = $this->panel;
        app()->form($this->form)->{$this->objects[p1]} = $this->p1;
        app()->form($this->form)->{$this->objects[p2]} = $this->p2;
        app()->form($this->form)->{$this->objects[p3]} = $this->p3;
        app()->form($this->form)->{$this->objects[p4]} = $this->p4;
        app()->form($this->form)->{$this->objects[p5]} = $this->p5;
        app()->form($this->form)->{$this->objects[p6]} = $this->p6;
        app()->form($this->form)->{$this->objects[p7]} = $this->p7;
        app()->form($this->form)->{$this->objects[p8]} = $this->p8;
        app()->form($this->form)->{$this->target->id} = $this->target;
    } 
        }
#----------------------------------------------------------------------------        
        else
        {
    if ($changeColor)
    {
        app()->form($this->form)->{$array[p1]}->fillColor =
        app()->form($this->form)->{$array[p2]}->fillColor =
        app()->form($this->form)->{$array[p3]}->fillColor =
        app()->form($this->form)->{$array[p4]}->fillColor =
        app()->form($this->form)->{$array[p5]}->fillColor =
        app()->form($this->form)->{$array[p6]}->fillColor =
        app()->form($this->form)->{$array[p7]}->fillColor =
        app()->form($this->form)->{$array[panel]}->borderColor =
        app()->form($this->form)->{$array[p8]}->fillColor = UXColor::of($this->color);    
    } 
    
    if ($changeblockedSizerColor)
    {
        for ($i = 1; $i <= 8; $i++)
        {
            if (app()->form($this->form)->{$array[p.$i]}->dragging->enabled == 0)
            {
                app()->form($this->form)->{$array[p.$i]}->fillColor = UXColor::of($this->blockedSizerColor);
            }
        }
    }
    
    if ($changeSetka)
    {
        app()->form($this->form)->{$array[panel]}->dragging->gridX =
        app()->form($this->form)->{$array[p1]}->dragging->gridX =
        app()->form($this->form)->{$array[p2]}->dragging->gridX =
        app()->form($this->form)->{$array[p3]}->dragging->gridX =
        app()->form($this->form)->{$array[p4]}->dragging->gridX =
        app()->form($this->form)->{$array[p5]}->dragging->gridX =
        app()->form($this->form)->{$array[p6]}->dragging->gridX =
        app()->form($this->form)->{$array[p7]}->dragging->gridX =
        app()->form($this->form)->{$array[p8]}->dragging->gridX = $this->setka[0];
        
        app()->form($this->form)->{$array[panel]}->dragging->gridY =
        app()->form($this->form)->{$array[p1]}->dragging->gridY =
        app()->form($this->form)->{$array[p2]}->dragging->gridY =
        app()->form($this->form)->{$array[p3]}->dragging->gridY =
        app()->form($this->form)->{$array[p4]}->dragging->gridY =
        app()->form($this->form)->{$array[p5]}->dragging->gridY =
        app()->form($this->form)->{$array[p6]}->dragging->gridY =
        app()->form($this->form)->{$array[p7]}->dragging->gridY =
        app()->form($this->form)->{$array[p8]}->dragging->gridY = $this->setka[1];
        
        app()->form($this->form)->{$array[panel]}->dragging->enable();
        app()->form($this->form)->{$array[p1]}->dragging->enable();
        app()->form($this->form)->{$array[p2]}->dragging->enable();
        app()->form($this->form)->{$array[p3]}->dragging->enable();
        app()->form($this->form)->{$array[p4]}->dragging->enable();
        app()->form($this->form)->{$array[p5]}->dragging->enable();
        app()->form($this->form)->{$array[p6]}->dragging->enable();
        app()->form($this->form)->{$array[p7]}->dragging->enable();
        app()->form($this->form)->{$array[p8]}->dragging->enable();    
    }
      
    if ($changeObjects)
    {
        app()->form($this->form)->{$array[panel]} = $this->panel;
        app()->form($this->form)->{$array[p1]} = $this->p1;
        app()->form($this->form)->{$array[p2]} = $this->p2;
        app()->form($this->form)->{$array[p3]} = $this->p3;
        app()->form($this->form)->{$array[p4]} = $this->p4;
        app()->form($this->form)->{$array[p5]} = $this->p5;
        app()->form($this->form)->{$array[p6]} = $this->p6;
        app()->form($this->form)->{$array[p7]} = $this->p7;
        app()->form($this->form)->{$array[p8]} = $this->p8;
        app()->form($this->form)->{$this->target->id} = $this->target;
    }  
        }   
    }

    /**
     * --RU--
     * Возращает массив с id созданних объектов,
     * ипользование:
     * @example 
     * Example: 
     * $formName = $this->getContextFormName();
     * ConnectObjects($formName);
     */
    public function ConnectObjects(string $form){
    $p1 = new UXRectangle();
    $p2 = new UXRectangle();
    $p3 = new UXRectangle();
    $p4 = new UXRectangle();
    $p5 = new UXRectangle();
    $p6 = new UXRectangle();
    $p7 = new UXRectangle();
    $p8 = new UXRectangle();
    for ($i = 1; $i<=8; $i++){
    $dragging = new DraggingBehaviour();
    $dragging->gridX = $this->setka[0];
    $dragging->gridY = $this->setka[1];
    if ($i == '2' or $i == '6')
    {
    $dragging->direction = "UP_DOWN";
    ${p.$i}->style = '-fx-cursor:'."n-resize";
    }
    else 
    {
    $dragging->direction = ($i == '1' or $i == '3' or $i == '5' or $i == '7') ? 'ALL':'LEFT_RIGHT';
        if($i == '8' or $i == '4')
        {
            ${p.$i}->style = '-fx-cursor:'."e-resize";
        }
        elseif ($i == '1' or $i == '5')
        {
            ${p.$i}->style = '-fx-cursor:'."nw-resize";
        }
        elseif ($i == '3' or $i == '7')
        {
            ${p.$i}->style = '-fx-cursor:'."ne-resize";
        }
    }
    $dragging->apply(${p.$i});
    ${p.$i}->size = [8, 8];
    ${p.$i}->position = [100, 100];
    ${p.$i}->strokeWidth = 0;
    ${p.$i}->fillColor = UXColor::of($this->color);
    ${p.$i}->id = str::random(21 + $i, "asdfghjklqwertyuopzxcvbnm");
    $d[p.$i] = ${p.$i}->id;
     $h[] = ${p.$i};
    }
    
        $panel = new UXPanel();
        $panel->backgroundColor = 'transparent';
        $panel->borderStyle = DASHED;
        $panel->borderColor = 'black';
        $panel->position = [100,100];
        $panel->minSize = [$this->minSize[0], $this->minSize[1]];
        $panel->id = str::random(30, "asdfghjklqwertyuopzxcvbnm");
        $dragging = new DraggingBehaviour();
        $dragging->direction = 'ALL';
        //$dragging->enable();
        $dragging->apply($panel);
    $d[panel] = $panel->id;
    $h[] = $panel;
        $but = new UXButton();
        $but->size = [32, 32];
        $but->position = [-100, -100];
        $but->text = $f;
        
        $but->id = str::random(31, "asdfghjklqwertyuopzxcvbnm");
    $d[but] = $but->id;
    $target = $this->target= $but;
    $h[] = $but;
    $f = 1;
    app()->form($form)->children->addAll($h);
    $panel->toFront();
        $p1->toFront();//rect6
        $p2->toFront();//rect7
        $p3->toFront();//rectAlt
        $p4->toFront();//rect3
        $p5->toFront();//rect
        $p6->toFront();//rect8
        $p7->toFront();//rect4
        $p8->toFront();//rect5
        $panel->backgroundColor = "transparent";
        $panel->position = $target->position;
        $panel->size = $target->size;
        $p5->position = [$target->size[0]+$target->position[0], $target->size[1]+$target->position[1]];
        $p1->position = [$target->position[0] - 8, $target->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x - $p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        $this->p1 = $p1;
        $this->p2 = $p2;
        $this->p3 = $p3;
        $this->p4 = $p4;
        $this->p5 = $p5;
        $this->p6 = $p6;
        $this->p7 = $p7;
        $this->p8 = $p8;
        $this->but = $but;
        $this->panel = $panel;
        $this->form = $form;
        $this->objects = $d;
    app()->form($form)->bind($p1->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        if ($f==1){
            if ($e->sender->x + $barier + 8 > $p5->x){
                $e->sender->x = $p5->x - $barier - 8;
            }
            if ($e->sender->y + $barier + 8 > $p5->y){
                $e->sender->y = $p5->y - $barier - 8;
            }
        }
        if ($f != 10){
            $panel->position = [$e->sender->position[0] + 8, $e->sender->position[1] + 8];
            $s[0] = $p5->position[0] - $e->sender->position[0] - 8;
            $s[1] = $p5->position[1] - $e->sender->position[1] - 8;
            $target->size = $panel->size = $s;
            $target->position = [$panel->position[0] - $this->StartPosition[0],$panel->position[1] - $this->StartPosition[1]];
        }
        
    });
    app()->form($form)->bind($p7->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $p5->y = $e->sender->y;
        $p1->x = $e->sender->x;
        $panel->backgroundColor = "transparent";
        $f = 4;
        $but->text = $f;
        if ($p5->y - $barier - 8 < $p3->y){
            $p5->y = $p3->y + $barier + 8;
        }
        if ($p1->x + $barier + 8 > $p3->x){
            $p1->x = $p3->x - $barier - 8;
        }
        $p8->y = $p4->y = ($p5->y - $p3->y) / 2 + $p3->y;
        $p2->x = $p6->x = ($p5->x - $p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p5->y;
    });
    
    app()->form($form)->bind($p5->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        if($f==3){
        if ($e->sender->x- $barier - 8 < $p1->x){
            $e->sender->x = $p1->x + $barier + 8;
        }
        if ($e->sender->y - $barier - 8 < $p1->y){
            $e->sender->y = $p1->y + $barier + 8;
        }
        }
    });
    
    app()->form($form)->bind($p5->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        global $f;
        $f=3;
        $but->text = $f;
    });

    
    app()->form($form)->bind($p1->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        global $f;
        $f=1;
        $but->text = $f;
    });
    
    app()->form($form)->bind($p7->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        if ($f == 4){
        if ($e->sender->x + $barier + 8 > $p3->x){
            $e->sender->x = $p3->x - $barier - 8;
        }
        if ($e->sender->y - $barier - 8 < $p3->y){
            $e->sender->y = $p3->y + $barier + 8;
        }
        }
    });

    
    app()->form($form)->bind($p7->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        $f = 4;
        $but->text = $f;
    });

    
    app()->form($form)->bind($p3->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;   
        $p5->x = $e->sender->x;
        $p1->y = $e->sender->y;
        $panel->backgroundColor = "transparent";
        $f = 2;
        $but->text = $f;
        if ($p5->x - $barier - 8 < $p7->x){
            $p5->x = $p7->x + $barier + 8;
        }
        if ($p1->y + $barier + 8 > $p7->y){
            $p1->y = $p7->y - $barier - 8;
        }
        $p8->y = $p4->y = ($p7->y - $p1->y) / 2 + $p1->y;
        $p2->x = $p6->x = ($p5->x - $p7->x) / 2 + $p7->x;
        $p8->x = $p1->x;
        $p4->x = $p5->x;
        $p2->y = $p1->y;
        $p6->y = $p7->y;
    });

    
    app()->form($form)->bind($p3->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        if ($f==2){
        if ($e->sender->x - $barier - 8 < $p7->x){
            $e->sender->x = $p7->x + $barier + 8;
        }
        if ($e->sender->y + $barier + 8 > $p7->y){
            $e->sender->y = $p7->y - $barier - 8;
        }
        }
    });

    
    app()->form($form)->bind($p3->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        $f=2;
        $but->text = $f;
    });

    
    app()->form($form)->bind($p1->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $p3->y = $e->sender->y;
        $p7->x = $e->sender->x;
        $panel->backgroundColor = "transparent";
        $f = 1;
        $but->text = $f;
        $panel->backgroundColor = "transparent";
        $f = 1;
        $but->text = $f;
        if ($p3->y + $barier + 8 > $p5->y){
            $p3->y = $p5->y - $barier - 8;
        }
        if ($p7->x + $barier + 8 > $p5->x){
            $p7->x = $p5->x - $barier - 8;
        }
        $p8->y = $p4->y= ($p5->y - $p3->y) / 2 + $p3->y;
        $p2->x = $p6->x= ($p5->x - $p7->x) / 2 + $p7->x;
        $p8->x = $p7->x;
        $p4->x = $p5->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
    });

    
    app()->form($form)->bind($p5->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $p3->x = $e->sender->x;
        $p7->y = $e->sender->y;
        $panel->backgroundColor = "transparent";
        $f = 3;
        $but->text = $f;
        if ($p7->y - $barier - 8 < $p1->y){
            $p7->y = $p1->y + $barier + 8;
        }
        if ($p3->x - $barier - 8 < $p1->x){
            $p3->x = $p1->x + $barier + 8;
        }
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x - $p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
    });
    
    app()->form($form)->bind($p6->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        $f = 7;
        $but->text = $f;
    });

    app()->form($form)->bind($p6->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        if ($f == 7){
        if ($e->sender->y - $barier - 8 < $p2->y){
            $e->sender->y = $p2->y + $barier + 8;
        }
        }
    });
    
    app()->form($form)->bind($p6->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $p5->y = $e->sender->y;
        $p7->y = $e->sender->y;
        $panel->backgroundColor = "transparent";
        $f = 7;
        $but->text = $f;
        if ($p7->y - $barier - 8 < $p1->y){
            $p5->y = $p7->y = $p1->y + $barier + 8;
        }
        $p8->y = $p4->y = ($p5->y - $p3->y) / 2 + $p3->y;
    });
    
    app()->form($form)->bind($p2->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        $f = 5;
        $but->text = $f;
    });

    app()->form($form)->bind($p2->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        if ($f == 5){
        if ($e->sender->y + $barier + 8 > $p6->y){
            $e->sender->y = $p6->y - $barier - 8;
        }
        }
    });

    app()->form($form)->bind($p2->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $p3->y = $e->sender->y;
        $p1->y = $e->sender->y;
        $panel->backgroundColor = "transparent";
        $f = 5;
        $but->text = $f;
        if ($p1->y + $barier + 8 > $p5->y){
            $p1->y = $p3->y = $p5->y - $barier - 8;
        }
        $p8->y = $p4->y = ($p5->y - $p3->y) / 2 + $p3->y;
    });
    
    app()->form($form)->bind($p8->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        $f = 8;
        $but->text = $f;
    });

    app()->form($form)->bind($p8->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;   
        if ($f == 8){
        if ($e->sender->x + $barier + 8 > $p4->x){
            $e->sender->x = $p4->x - $barier - 8;
        }
        }
    });

    app()->form($form)->bind($p8->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $p7->x = $e->sender->x;
        $p1->x = $e->sender->x;
        $panel->backgroundColor = "transparent";
        $f = 8;
        $but->text = $f;
        if ($p1->x + $barier + 8 > $p5->x){
            $p1->x = $p7->x = $p5->x - $barier - 8;
        }
        $p2->x = $p6->x = ($p5->x - $p7->x) / 2 + $p7->x;
    });
    
    app()->form($form)->bind($p4->id.'.mouseEnter' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        $f = 6;
        $but->text = $f;
    });

    app()->form($form)->bind($p4->id.'.step' ,function (UXEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        if ($f == 6){
        if ($e->sender->x - $barier - 8 < $p8->x){
            $e->sender->x = $p8->x + $barier + 8;
        }
        }
    });

    app()->form($form)->bind($p4->id.'.mouseDrag' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $p5->x = $e->sender->x;
        $p3->x = $e->sender->x;
        $panel->backgroundColor = "transparent";
        $f = 6;
        $but->text = $f;
        if ($p5->x - $barier - 8 < $p1->x){
            $p5->x = $p3->x = $p1->x + $barier + 8;
        }
        $p2->x = $p6->x = ($p5->x - $p1->x) / 2 + $p1->x;
    });

    app()->form($form)->bind($panel->id.'.mouseDown-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;
        $f = 10;
        $panel->backgroundColor = UXColor::of($this->colorPanel);
        $panel->toFront();
        $p5->toFront();
        $p3->toFront();
        $p4->toFront();
        $p7->toFront();
        $p8->toFront();
        $p1->toFront();
        $p2->toFront();
        $p6->toFront();
        $but->text = $f;
    });

    app()->form($form)->bind($panel->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        $panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        $f = 0;
        $but->text = $f;
    });
    
    app()->form($form)->bind($p1->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    
    app()->form($form)->bind($p2->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    
    app()->form($form)->bind($p3->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    
    app()->form($form)->bind($p4->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    
    app()->form($form)->bind($p5->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    
    app()->form($form)->bind($p6->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    
    app()->form($form)->bind($p7->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    
    app()->form($form)->bind($p8->id.'.mouseUp-Left' ,function (UXMouseEvent $e = null) use($e,$barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this){$f = $but->text;$barier = $this->barier;$target = $this->target;    
        //$panel->backgroundColor = "transparent";
        $p5->position = [$panel->size[0] + $panel->position[0], $panel->size[1] + $panel->position[1]];
        $p1->position = [$panel->position[0] - 8, $panel->position[1] - 8];
        $p3->position = [$p5->x, $p1->y];
        $p7->position = [$p1->x, $p5->y];
        $p8->y = $p4->y = ($p3->y - $p7->y) / 2 + $p7->y;
        $p2->x = $p6->x = ($p3->x-$p1->x) / 2 + $p1->x;
        $p8->x = $p1->x;
        $p4->x = $p3->x;
        $p2->y = $p3->y;
        $p6->y = $p7->y;
        //$f = 0;
        //$but->text = $f;
    });
    return $d;
    }
    /**
     * --RU--
     * Устанавливает цель на передаваемий объект
     */
    public function setTarget(string $object, $form = null, $array = null)
    {    
    if (isset($form)==false){$form = $this->form;}
    if (isset($array)==false){$array = $this->objects;}
    //pre(app()->form($form)->{$object}->text);
         //global $barier,$panel,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$but,$target,$this;
         app()->form($form)->{$object}->minSize = [$this->minSize[0], $this->minSize[1]];
        $this->target = app()->form($form)->{$object};
        app()->form($form)->{$array[p5]}->toFront();
        app()->form($form)->{$array[p3]}->toFront();
        app()->form($form)->{$array[p4]}->toFront();
        app()->form($form)->{$array[p7]}->toFront();
        app()->form($form)->{$array[p8]}->toFront();
        app()->form($form)->{$array[p1]}->toFront();
        app()->form($form)->{$array[p2]}->toFront();
        app()->form($form)->{$array[p6]}->toFront();
        app()->form($form)->{$array[panel]}->toFront();
        app()->form($form)->{$array[panel]}->backgroundColor = "transparent";
        app()->form($form)->{$array[panel]}->position = [app()->form($form)->{$object}->position[0] + $this->StartPosition[0],app()->form($form)->{$object}->position[1] + $this->StartPosition[1]];
        app()->form($form)->{$array[panel]}->size = app()->form($form)->{$object}->size;
        app()->form($form)->{$array[p5]}->position = [app()->form($form)->{$object}->size[0] + app()->form($form)->{$object}->position[0]  + $this->StartPosition[0], app()->form($form)->{$object}->size[1] + app()->form($form)->{$object}->position[1] + $this->StartPosition[1]];
        app()->form($form)->{$array[p1]}->position = [app()->form($form)->{$object}->position[0] + $this->StartPosition[0] - 8, app()->form($form)->{$object}->position[1] + $this->StartPosition[1]-8];
        app()->form($form)->{$array[p3]}->position = [app()->form($form)->{$array[p5]}->x, app()->form($form)->{$array[p1]}->y];
        app()->form($form)->{$array[p7]}->position = [app()->form($form)->{$array[p1]}->x, app()->form($form)->{$array[p5]}->y];
        app()->form($form)->{$array[p8]}->y = app()->form($form)->{$array[p4]}->y = (app()->form($form)->{$array[p3]}->y - app()->form($form)->{$array[p7]}->y) / 2 + app()->form($form)->{$array[p7]}->y;
        app()->form($form)->{$array[p2]}->x = app()->form($form)->{$array[p6]}->x = (app()->form($form)->{$array[p3]}->x - app()->form($form)->{$array[p1]}->x) / 2 + app()->form($form)->{$array[p1]}->x;
        app()->form($form)->{$array[p8]}->x = app()->form($form)->{$array[p1]}->x;
        app()->form($form)->{$array[p4]}->x = app()->form($form)->{$array[p3]}->x;
        app()->form($form)->{$array[p2]}->y = app()->form($form)->{$array[p3]}->y;
        app()->form($form)->{$array[p6]}->y = app()->form($form)->{$array[p7]}->y;
        $f = 0;
        app()->form($form)->{$array[but]}->text = $f;
    }    
}