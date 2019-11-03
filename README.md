### 1.设计模式概述
设计模式是一把双刃剑，在工作场景中，只有很少的设计模式会被在业务场景中使用到，最常用的就是**单例模式**。相反，工作中使用的框架则在底层使用到了大量的设计模式，这样做提高了框架的性能、更好的解耦各个模块之间的功能、提供更好的拓展性、最大程度简化了开发者使用成本。实际上，在业务场景中使用合适的设计模式，也会达到事半功倍的效果。不过要想使用好设计模式，必须要深刻理解它设计的初衷和适用的场景分别是什么，这并不是一件容易的事情！本文结合四种常见的设计模式，聊一聊在php应用开发场景中，怎样更好的使用设计模式来简化业务逻辑，使得需求可拓展，代码更容易维护。本文使用到的案例放在:[设计模式](https://github.com/GuoZhaoran/designPattern) ,先来学习一下基本知识:设计模式的七大原则、分类和UML类图的使用。

#### 1.1 设计模式的七大原则
- **开闭原则（ Open Close Principle )**;在对程序进行更新迭代的过程中，应当合理的避免修改类或方法的内部代码，而是优先选择通过继承、扩展等方式来实现。简而言之，就是：对扩展开放，对修改关闭。
- **里氏替换原则（ Liskov Substitution Principle ）**;在实现子类的定义时，应该让它完全拥有替代父类进行工作的能力。简而言之，就是：子类对外要具与父类一致的方法或接口。
- **依赖倒置原则（ Dependence Inversion Principle ）**;在对象或类的依赖关系定义上，父类或者其他上层实现不应该依赖于子类或者其他下层实现，通过这样，来避免依赖关系的耦合。
- **单一职责原则（ Single Responsibility Principle ）**;在程序结构和依赖关系的定义上，要将类的功能职责充分理清，尽力减少类之间的耦合。避免对某个类进行修改时，牵一发动全身的连锁反应。
- **接口隔离原则（ Interface Segregation Principle ）**;在对外接口的定义上，要避免庞大而臃肿的接口，而是进行责任细化的区分，避免冗余的代码实现。这对于提高内聚，提升系统灵活度是非常有效果的。
- **最少知识原则（ Least Knowledge Principle ）**;在分配类的职责和建立依赖关系时，应该只关注于自身的功能实现和周围与之接触类的交互方式。避免类去考虑整个系统结构和处理流程，让类的职责清晰化，让系统的耦合度降低。
- **合成复用原则（ Composite Reuse Principle ）**;在扩展功能的时候，要优先考虑水平形式的新增类或方法，而不是通过继承去实现。也就是通过功能的组合实现类，而不是通过基础去实现新的功能。这样可以提高类的可扩展性，减少系统的层次。

这七大原则为我们设计程序提供了指导，可以说是优秀程序设计的方法论。 不过理论往往又是简短而抽象的，大家想要理解并熟练用它们去指导程序设计，还需从大量的实践中去领悟。下边我们介绍使用设计模式的时候也会根据这七大原则设计。

#### 1.2 设计模式的分类
设计模式本身是非常丰富的，一般将面向对象的设计模式分为三类：创建型、结构型和结构型。

**1.2.1 创建型**

创建对象时，不再由我们直接实例化对象；而是根据特定场景，由程序来确定创建对象的方式，从而保证更大的性能、更好的架构优势。
创建型模式主要有：

- 单例模式（常用）
- 工厂模式：简单工厂模式、工厂方法模式、抽象工厂模式（常用）（注：简- 单工厂模式不属于23种设计模式）
- 生成器模式
- 原型模式

**1.2.2 结构型**

用于帮助将多个对象组织成更大的结构。

结构型模式主要有：

- 适配器模式（常用）
- 装饰器模式
- 代理模式
- 门面模式(外观模式)
- 桥接模式
- 组合模式
- 亨元模式

**1.2.3 行为型**

用于帮助系统间各对象的通信，以及如何控制复杂系统中流程。

行为型模式主要有：

- 策略模式（常用）
- 观察者模式（常用）
- 模板模式
- 迭代器模式
- 职责链模式
- 命令模式
- 备忘录模式
- 状态模式
- 访问者模式
- 中介者模式
- 解释器模式


#### 1.3 UML类图的使用
很多东西使用文字表述是苍白无力的，尤其是设计模式这种抽象的理论。我们使用UML类图来增加我们的表达力。类图(Class diagram)主要用于描述系统的结构化设计。类图也是最常用的UML图，用类图可以显示出类、接口以及它们之间的静态结构和关系。

在UML类图中，常见的有以下几种关系:
- 继承/泛化（Generalization）：用于描述父类与子类之间的关系。父类又称作基类，子类又称作派生类。通过extends实现，如：class Bus extends Car
- 实现（Realization），主要用来规定接口和实现类的关系。通过implements实现，如：class Car implements Vehicle
- 关联（Association)
- 聚合（Aggregation）
- 组合(Composition)
- 依赖(Dependency)

![](https://user-gold-cdn.xitu.io/2019/10/27/16e0d0d94806d910?w=300&h=290&f=png&s=10727)

> 这六种类关系中，组合、聚合和关联的代码结构一样，可以从关系的强弱来理解，各类关系从强到弱依次是：继承→实现→组合→聚合→关联→依赖。（目前自己的理解）除了继承和实现，其他类关系较弱，一般是通过在一个类中调用其他类来实现。

### 2.四种设计模式在业务场景中的应用
我们本节介绍的四种设计模式分别是：工厂模式、装饰器模式、发布/订阅模式、迭代器模式。选择这四种设计模式是因为在PHP业务场景中会经常用到他们，笔者还整理了一些相关的一些案例。

#### 2.1 工厂模式

“工厂模式”简单来讲就是将创建对象的任务交给工厂，根据抽象层次的不同，又分为:简单工厂、工厂方法和抽象工厂。

**简单工厂模式(Simple Factory Pattern)**：又称为静态工厂方法(Static Factory Method)模式，它属于类创建型模式。在简单工厂模式中，可以根据参数的不同返回不同类的实例。简单工厂模式专门定义一个类来负责创建其他类的实例，被创建的实例通常都具有共同的父类。它的抽象层次低，工厂类一般也不会包含复杂的对象生成逻辑，只能适用于生成结构比较简单，扩展性要求较低的对象。

**工厂方法模式(Factory Method Pattern)**： 又称为工厂模式，也叫虚拟构造器(Virtual Constructor)模式或者多态工厂(Polymorphic Factory)模式，它属于类创建型模式。在工厂方法模式中，工厂父类负责定义创建产品对象的公共接口，而工厂子类则负责生成具体的产品对象，这样做的目的是将产品类的实例化操作延迟到工厂子类中完成，即通过工厂子类来确定究竟应该实例化哪一个具体产品类。

**抽象工厂模式(Abstract Factory Pattern)** ：提供一个创建一系列相关或相互依赖对象的接口，而无须指定它们具体的类。抽象工厂模式又称为Kit模式，属于对象创建型模式。抽象工厂模式包含如下角色：

- AbstractFactory：抽象工厂
- ConcreteFactory：具体工厂
- AbstractProduct：抽象产品
- Product：具体产品

我们使用工厂模式的业务场景是这样的:一个专门做“运动户外”新零售的公司，想要在自己的APP上向用户推荐不同的服装、鞋帽搭配套装，推荐的策略根据用户性别的不同有所不同,男生推荐鞋子和背包，女生推荐外套和裤子;根据产品策略的不同，又有不同的推荐版本，比如第一个版本只推荐阿迪达斯的产品，第二个版本则推荐耐克的产品。这个业务场景就非常适合使用“抽象工厂模式”。我们先来看一下UML类图:

![工厂类UML类图实现](https://user-gold-cdn.xitu.io/2019/10/28/16e12f24fb24ca1f?w=791&h=615&f=png&s=73059)

是的，使用抽象工厂模式确实有一个缺点：类特别多。但是带来的好处也是很明显的，我们先来看一下代码实现:

首先是抽象工厂类：
```
abstract class recommendFactory
{
    public function createRecommendClass($sex) {}
}
```

我们假设每一个版本的推荐都有一个相关的工厂类，他们都继承抽象工厂类:
```
class concreteRecommendFactoryV1 extends recommendFactory
{
    public function createRecommendClass($sex) {
        switch ($sex) {
            case 'man':
                return new concreteRecommendClassV1man();
            case 'women':
                return new concreteRecommandClassV1women();
        }
    }
}
......
class concreteRecommendFactoryV2 extends recommendFactory
{
    public function createRecommendClass($sex) {
        switch ($sex) {
            case 'man':
                return new concreteRecommendClassV2man();
            case 'women':
                return new concreteRecommendClassV2women();
        }
    }
}
```
工厂类用来生产产品对象，根据用户的性别生产不同的对象实例，产品对象也都有继承的抽象类，我们来看一下产品的抽象类：
```
abstract class recommendClass
{
    public function recommendRun() {}
}
```
然后工厂类生产出来根据产品类得到的产品实例。我们来分别看一下产品类的内容:
```
class concreteRecommendClassV1man extends recommendClass
{
    public function recommendRun() {
        return '推荐耐克鞋子和背包';
    }
}
......
class concreteRecommandClassV1women extends recommendClass
{
    public function recommendRun() {
        return '推荐耐克上衣和裤子';
    }
}
......
class concreteRecommendClassV2man extends recommendClass
{
    public function recommendRun() {
        return '推荐阿迪达斯鞋子和背包';
    }
}
......
class concreteRecommendClassV2women extends recommendClass
{
    public function recommendRun() {
        return '推荐阿迪达斯上衣和裤子';
    }
}
```
这样我们就可以根据不同的版本，用户不同的性别来展示不同的推荐信息了:
```
include './recommendClass.php';
include './concreteRecommendClassV1man.php';
include './concreteRecommendClassV2man.php';
include './concreteRecommandClassV1women.php';
include './concreteRecommendClassV2women.php';
include './recommendFactory.php';
include './concreteRecommendFactoryV1.php';
include './concreteRecommendFactoryV2.php';

$sex = $_GET['sex'];
$version = $_GET['version'];

switch ($version) {
    case 'version1' :
        $factory = new concreteRecommendFactoryV1();
        break;
    case 'version2' :
        $factory = new concreteRecommendFactoryV2();
}

$recommendClass = $factory->createRecommendClass($sex);
$recommendContent = $recommendClass->recommendRun();
echo $recommendContent.'<br/>';
```
虽然我们实现逻辑中用到的类比较的多，但是代码的可拓展性很强。再次发布不同的版本推荐策略时，我们只要创建相应的工厂，生产对应的类即可。

抽象工厂模式隔离了具体类的生成，由于这种隔离，更换一个具体工厂就变得相对容易。所有的具体工厂都实现了抽象工厂中定义的那些公共接口，因此只需改变具体工厂的实例，就可以在某种程度上改变整个软件系统的行为。另外，应用抽象工厂模式可以实现高内聚低耦合的设计目的，因此抽象工厂模式得到了广泛的应用。

#### 2.2 装饰器模式
装饰器模式属于结构型模式,装饰器模式可以动态的给一个对象添加额外的功能，就增加功能来说，装饰器模式比生成子类更为灵活；它允许向一个现有的对象添加新的功能，同时又不改变其结构。读过Laravel源码的人应该都知道，Laravel中间件(Middleware)的实现就是使用的装饰器模式;Koa.js 最为人所知的基于 **洋葱模型** 的HTTP中间件处理流程也是装饰器模式。关于Laravel中间件源码的实现，笔者专门整理了一篇博文，感兴趣的读者可以读一下:[Lumen中间件源码解析](https://juejin.im/post/5dbc3f64e51d456f28370b51)

我们现在有这样一个需求:现在有一家餐馆，入住美团之后提供外卖服务，通过让顾客选套餐的方式，提供给用户选择的多样性，以此来增加销量。其中套餐可以由:主食、素菜、饮料、荤菜组成，其中主食和素材是基本套餐项，顾客可以再次基础上再选择添加饮料和荤菜，简单列一下菜系:

- 主食:米饭、馒头
- 素菜:土豆丝、番茄鸡蛋、炒豆角
- 饮料:雪碧、可乐、酸梅汤
- 荤菜:回锅肉、牛排、羊排

明确了需求，我们来看一下案例中使用到装饰器所用到的UML类图:


![装饰器模式UML类图](https://user-gold-cdn.xitu.io/2019/11/3/16e2edcb45775be1?w=471&h=331&f=jpeg&s=27094)

根据UML类图，我们来看一下代码实现,首先是添加菜品的接口:
```
<?php
/**
 * Description: 抽象接口，真实对象和装饰对象具有相同的接口
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */
interface AbstractComponent{
    public function addCategory(array &$dishes, Closure $next);
}
```

一个具体要装饰的对象ConcreteComponent实现了这个接口:

```
<?php
/**
 * Description: 具体的对象
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class ConcreteComponent implements AbstractComponent
{
    public function addCategory(array &$dishes, Closure $next)
    {
        return function(&$dishes) use ($next) {
            $dishes[] = ['米饭', '馒头'];
            $dishes[] = ['土豆丝', '番茄鸡蛋', '炒豆角'];

            return $next($dishes);
        };
    }
}
```
我们这里直接定义了主食和素材作为基础套餐，接下来对它进行装饰。
接下来就是定义了装饰器的抽象类了:
```
<?php
/**
 * Description: 装饰类,继承了Component,从外类来扩展Component类的功能。
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

abstract class AbstractDecorator implements AbstractComponent
{
    private function initCategory() {}
    public function addCategory(array &$dishes, Closure $next) {}
}
```

抽象类中定义了一个私有方法initCategory，用来管理菜系的菜品，比如说素菜有：土豆丝、番茄鸡蛋、炒豆角，将来还可能添加豆腐、海带等其他素菜菜品。addCategory就是装饰器，将菜品添加到用户选择的菜系中。荤菜类和饮料类菜品继承了抽象装饰器:

```
<?php
/**
 * Description: 荤菜装饰器,为菜品添加荤菜
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class ChivesDecorator extends AbstractDecorator
{
    private function initCategory()
    {
        return ['回锅肉', '牛排', '羊排'];
    }

    public function addCategory(array &$dishes, Closure $next)
    {
        $dishes[] = $this->initCategory();
        return $next($dishes);
    }
}
......
/**
 * Description: 饮料装饰器,为菜品添加类
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-20
 */

class DrinkDecorator
{
    private function initCategory()
    {
        return ['雪碧', '可乐', '酸梅汤'];
    }

    public function addCategory(array &$dishes,Closure $next)
    {
        $dishes[] = $this->initCategory();
        return $next($dishes);
    }
}
```

基本的类都实现了之后，我们来看一下怎样在基础套餐之上进行装饰吧：

```
<?php
include __DIR__.'/AbstractComponent.php';
include __DIR__.'/AbstractDecorator.php';
include __DIR__.'/ConcreteComponent.php';
include __DIR__.'/DrinkDecorator.php';
include __DIR__.'/ChivesDecorator.php';

//将用户选好的套餐排列组合
$output = function ($dishes) {
    $items = [];
    $init = array_shift($dishes);
    foreach($init as $item) {
        $items[] = [$item];
    }
    do{
        $elements = array_shift($dishes);
        $temp = [];
        foreach($elements as $element) {
            foreach($items as $item) {
                $item[] = $element;
                $temp[] = $item;
            }
        }
        $items = $temp;
    } while(count($dishes));

    return $items;
};

//组合函数,将装饰器函数一层层包装
function combinationFunc()
{
    return function($stack, $decorators){
        return function (&$dishes) use ($stack, $decorators) {
            return $decorators->addCategory($dishes, $stack);
        };
    };
}

$dishes = [];
$baseCategory = (new ConcreteComponent())->addCategory($dishes, $output);

print '加荤菜和饮料后的套餐组合<br/>';
$addCategoryDecorators = [new DrinkDecorator(), new ChivesDecorator()];
$go = array_reduce(array_reverse($addCategoryDecorators), combinationFunc(), $baseCategory);

var_dump($go($dishes));
```

首先我们将用户选择的套餐放到数组\$dishes中，我们向套餐中添加基础套餐
\$baseCategory = (new ConcreteComponent())->addCategory(\$dishes, $output);

其中$output是排列组合函数，用户选择套餐之后，对用户选择的菜品进行排列组合,比如用户选择了主食、素材和荤菜，那么我们就从这三种菜系中各挑出一个菜进行组合形成套餐。说起来容易，但是对二维数组排列组合不是一件简单的事情，笔者这里的方法读者可以参考一下：
```
$output = function ($dishes) {
    $items = [];
    $init = array_shift($dishes);
    foreach($init as $item) {
        $items[] = [$item];
    }
    do{
        $elements = array_shift($dishes);
        $temp = [];
        foreach($elements as $element) {
            foreach($items as $item) {
                $item[] = $element;
                $temp[] = $item;
            }
        }
        $items = $temp;
    } while(count($dishes));

    return $items;
};
```

接下来我们用荤菜类和饮料类对基本的套餐类进行装饰：
```
print '加荤菜和饮料后的套餐组合<br/>';
$addCategoryDecorators = [new DrinkDecorator(), new ChivesDecorator()];
$go = array_reduce(array_reverse($addCategoryDecorators), combinationFunc(), $baseCategory);

var_dump($go($dishes));
```

这样就达到了我们想要的效果，如果读者对array_reduce函数不是很理解的话可以看一下官方文档。这样一个选择套餐的装饰器就完成了，我们可以根据用户选择的套餐信息来组合装饰器，比如这里的$addCategoryDecorators是饮料类和荤菜类，将来还可以增加其他用户选择的菜系。这种装饰器模式并没有通过继承来拓展基础类套餐，而是通过组合横向拓展了类的能力，后期代码也方便维护，装饰器模式也可以称为责任链模式、管道模式，在项目中也经常会使用到。

#### 2.3 发布/订阅模式

发布/订阅模式（又称为观察者模式，属于行为型模式的一种，它是将行为独立模块化，降低了行为和主体的耦合性。它定义了一种一对多的依赖关系，让多个观察者对象同时监听某一个主题对象。这个主题对象在状态变化时，会通知所有的观察者对象，使他们能够自动更新自己。熟悉js操作DOM的读者应该知道，为DOM元素绑定一个事件可以使用addEventListener方法，其实这就是一种发布/订阅模式，当事件发生时，各个监听的组建就会收到通知，继而产生交互效果。发布/订阅模式在项目中使用的非常多，例如Lumen框架中想要监听数据库的操作，并把数据库的每一次操作都记录到日志当中去，将来可以分析慢查询问题，就可以使用如下方法：

```
\DB::listen(function ($query) {
               ....//这里是对sql语句的操作
            });
```

php底层的很多实现机制也都使用到了发布/订阅模式，比如信号处理、错误处理等。和生产者、消费者模式不同的是，生产者、消费者往往是在两个进程中进行的，是一种异步处理的策略，发布/订阅模式则是当主体对象发生改变时，实时通知到观察者。

发布/订阅模式如此重要，以至于SPL直接给出了实现方案，我们本例中也是通过SPL提供的接口SplSubject/SplObserver来实现的，例子也是最普通的：学校中当有新书上架时，将新书上架的消息通知给老师和学生。

我们先来看一下发布/订阅模式的UML类图:


![订阅发布模式UML类图](https://user-gold-cdn.xitu.io/2019/11/3/16e2f26f458026e9?w=476&h=231&f=jpeg&s=20917)

 其中SplSubject类提供添加监听者(attach)，删除监听者(detach)，通知监听者(notify)三个方法，Book类实现了这个接口，我们来看一下代码:
 
 ```
 <?php
/**
 * Description: 订阅与发布模式的实现
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class Book implements SplSubject
{
    private $author = null;    //作者
    private $price = null;     //售价
    private $name = null;      //书名

    private $observers = null;

    public function __construct($name, $author, $price)
    {
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;

        //初始化观察者为spl对象存储
        $this->observers = new SplObjectStorage();
    }

    /**
     * 添加观察者
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * 删除观察者
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * 通知观察者
     */
    public function notify()
    {
        $params = [
            'name' => $this->name,
            'author' => $this->author,
            'price' => $this->price
        ];

        foreach ($this->observers as $observer) {
            $observer->update($this, $params);
        }
    }
}
 ```
 
 我们这里是用到了SplObjectStorage对象来存储观察者对象，这样就省去了底层数组的很多操作细节，比如in_array判断观察者对象是否已经存在了，这是一种委托设计模式。接下来我们再来实现订阅者，订阅者只需要实现SplObserver的update方法即可：
 ```
 <?php
/**
 * Description: 学生类观察者
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class Student implements SplObserver
{
    public function update(\Splsubject $subject)
    {
        // TODO: Implement update() method.
        if(func_num_args() == 2) {
            $params = func_get_arg(1);
            echo '学生已经收到',$params['name'],'上架的信息','作者:',$params['author'],'定价:',$params['price'],"<br>";
        }
    }
}
......
class Teacher implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        if(func_num_args() == 2) {
            $params = func_get_arg(1);
            echo '老师已经收到',$params['name'],'上架的信息','作者:',$params['author'],'定价:',$params['price'],"<br/>";
        }
    }
}
 ```
 
 学生类和老师类收到新书上架的信息后，会打印出接收通知，update接收一个SplSubject对象，其实在Observer类中接收Subject对象属性的方法更好的是在Subject对象中添加一个getParams的方法，不直接去访问对象的内部属性，这样做设计模式中开闭原则。本例中通过参数接收发布者传递过来的信息，有些取巧，不过也达到了效果。接下来只要给发布者添加监听对象就可以了:
 
 ```
 <?php
include __DIR__.'/Book.php';
include __DIR__.'/Student.php';
include __DIR__.'/Teacher.php';

$student = new Student();
$teacher = new Teacher();
$book = new Book('<<钢铁是怎样炼成的>>', '奥斯特洛夫斯基', '79.00');
$book->attach($student);
$book->attach($teacher);

$book->notify();
 ```
 
 几乎所有的api框架中都会提供这样一种事件发布/订阅机制，Laravel中专门有自己的Event模块的设计，基于此可以实现事件的广播。发布/订阅模式实现相对简单，读者自己也可以进行实现。
 
 #### 2.4 迭代器模式
 
 迭代器模式（Iterator），又叫做游标（Cursor）模式。提供一种方法访问一个容器（Container）对象中各个元素，而又不需暴露该对象的内部细节。 当你需要访问一个聚合对象，而且不管这些对象是什么都需要遍历的时候，就应该考虑使用迭代器模式。另外，当需要对聚集有多种方式遍历时，可以考虑去使用迭代器模式。迭代器模式为遍历不同的聚集结构提供如开始、下一个、是否结束、当前哪一项等统一的接口。 PHP标准库（SPL）中提供了迭代器接口 Iterator，要实现迭代器模式，实现该接口即可。我们来看一个简单的例子，我们使用对象从数据库中取到数据之后，想要遍历取出对象中的数据，就可以使用迭代器模式，UML类图非常简单:
 
![](https://user-gold-cdn.xitu.io/2019/11/3/16e2f4059da9e0e0?w=161&h=321&f=jpeg&s=11953)
 
 我们先来实现一个简单的数据库连接查询类，php7以后移除了mysqli模块，推荐使用PDO操作数据库(笔者认为这也和设计模式有关系，php程序员已经习惯了提到php就想到mysql，而PDO却可以将操作mysql、sqlserver、Oracle其他数据库的操作封住成统一的接口，这是一种适配器的设计模式)。我们例子使用PDO简单实现一下：
 ```
 class PdoDB
{
    private static $conn = null;

    //禁止被实例化
    private function __construct()
    {
    }

    private static function connDB()
    {
        return new PDO('mysql:host=localhost;sort=3306;dbname=study;', 'root', 'root');
    }

    /**
     * 获取数据库连接单例
     * @return null|PDO
     */
    public static function getInstance()
    {
        if (is_null(self::$conn)) {
            self::$conn = self::connDB();
        }
        return self::$conn;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
        echo 'error!';
    }
}
 ```
 
 我们那的PdoDB使用了**单例模式**实现，单例模式中的构造函数是private，另外当用户对对象进行克隆的时候，应该报错（克隆对象的操作也是一种设计模式，叫**原型模式**，和单例模式不同的是：原型模式是创建型模式，是创建新对象，而单例模式的目的是共用一个对象）。接下来我们实现Users类，其中使用PdoDB操作数据库取出数据，并实现迭代器Iterator:
 
 ```
 <?php
/**
 * Description: 迭代类
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */

class Users implements Iterator
{
    protected $data;
    protected $index;

    public function __construct()
    {
        $this->data = PdoDB::getInstance()->query('select * from users')->fetchAll();
    }

    public function current()
    {
        $current = $this->data[$this->index];

        return $current;
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return $this->index < count($this->data);
    }

    public function rewind()
    {
        $this->index = 0;
    }
}
 ```

然后我们就可以对Users对象进行遍历了:

```
<?php
/**
 * Description: File basic description here...
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */
include __DIR__.'/PdoDB.php';
include __DIR__.'/Users.php';

//对数据进行迭代
$users = new Users();
foreach($users as $user) {
    var_dump($user);
}
```

上边的例子很简单；说到迭代器，不得不提一下PHP另外一个强大的特性：生成器，生成器是 PHP 5.5 引入的新特性，但是目前貌似很少人用到它。
下面试 PHP 官方文档上对生成器的解释：
生成器提供了一种更容易的方法来实现简单的对象迭代，相比较定义类实现 Iterator 接口的方式，性能开销和复杂性大大降低。
生成器允许你在 foreach 代码块中写代码来迭代一组数据而不需要在内存中创建一个数组, 那会使你的内存达到上限，或者会占据可观的处理时间。相反，你可以写一个生成器函数，就像一个普通的自定义函数一样, 和普通函数只返回一次不同的是, 生成器可以根据需要 yield 多次，以便生成需要迭代的值。

我们来看一个简单的文件读取的例子:

```
<?php
/**
 * Description: 生成器读取超大文件
 * User: guozhaoran<guozhaoran@cmcm.com>
 * Date: 2019-10-27
 */
header("content-type:text/html;charset=utf-8");

/*$startMemory = memory_get_usage();
$value = file_get_contents('./test.txt');
$useMemory = memory_get_usage() - $startMemory;
echo '一共占用了',$useMemory,'字节内存';*/

function readTxt()
{
    $handle = fopen('./test.txt', 'rb');

    while (feof($handle)===false) {
        yield fgets($handle);
    }

    fclose($handle);
}

$startMemory = memory_get_usage();
foreach (readTxt() as $key => $value) {
   $lineData = $value;
}

$useMemory = memory_get_usage() - $startMemory;
echo '一共占用了',$useMemory,'字节内存';
```

运行上边案例，对比使用file_get_contents读取文件，我们看到使用生成器节省了大量的内存，生成器的引入使得程序中的函数达到了中断的效果，实现迭代器也只需要使用yield关键字即可，yield返回的就是一个Iterator对象。总的来说，迭代器模式在业务场景中不常用，但是很有用，读者如果之前没接触过类似的概念，可以搜集资料学习一下并在项目中使用。

### 3.小结
设计模式的内容多多少少还是有些抽象的，它是一把双刃剑，很容易被滥用。不同的设计模式适用于不同的业务场景，只有通过大量的经验积累和学习理解，才能将设计模式用的恰到好处。设计模式的最终目的是为了使系统解耦，方便开发者维护代码。设计模式有很多，笔者认为，结合不同的业务场景尝试使用合理的设计模式解决问题，是最好的学习方式。
