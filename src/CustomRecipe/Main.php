<?php
namespace CustomRecipe;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\nbt\NBT;
use pocketmine\inventory\ShapedRecipe;
use pocketmine\inventory\BigShapedRecipe;
use pocketmine\inventory\FurnaceRecipe;
//use pocketmine\inventory\ShapelessRecipe;
//use pocketmine\inventory\BigShapelessRecipe;
//use pocketmine\inventory\BrewingRecipe;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
    
class Main extends PluginBase implements Listener{

    function onEnable(){
        $this->getLogger()->notice("§b Loaded CustomRecipe. Created by §ekorado531m7\n§bLoading Configuration And Applying Recipe...");
        @mkdir($this->getDataFolder(), 0777, true);
        if(file_exists($this->getDataFolder()."recipelist.yml")){
            $this->recipe = new Config($this->getDataFolder() . "recipelist.yml", Config::YAML);
            $this->registerRecipe();
            $this->getLogger()->notice("§8[§aCustomRecipe§8]§b Recipe Applied");
        }else{
            $this->saveResource("recipelist.yml", false);
            $this->getLogger()->alert("§b Prepairing Succeed. Please Edit Recipe List If You Need to, Then Restart Your Server.");
            $this->getServer()->forceShutdown();
        }
    }
    
    private function registerRecipe(){
        foreach($this->recipe->get("recipe") as $key=>$data){
            switch($data["crafttype"]){
                case "ShapedRecipe":
                    if(empty($data["result-name"])){
                        $recipedata = (new ShapedRecipe(Item::get($data["result-id"], $data["result-damage"], $data["result-amount"]),$data["placement-1"],$data["placement-2"],$data["placement-3"]));
                        if(!empty($data["placeword-1"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-1"]), Item::get($data["placeid-1"], $data["placedamage-1"]));
                        }
                        if(!empty($data["placeword-2"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-2"]), Item::get($data["placeid-2"], $data["placedamage-2"]));
                        }
                        if(!empty($data["placeword-3"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-3"]), Item::get($data["placeid-3"], $data["placedamage-3"]));
                        }
                        if(!empty($data["placeword-4"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-4"]), Item::get($data["placeid-4"], $data["placedamage-4"]));
                        }
                        if(!empty($data["placeword-5"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-5"]), Item::get($data["placeid-5"], $data["placedamage-5"]));
                        }
                        if(!empty($data["placeword-6"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-6"]), Item::get($data["placeid-6"], $data["placedamage-6"]));
                        }
                        if(!empty($data["placeword-7"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-7"]), Item::get($data["placeid-7"], $data["placedamage-7"]));
                        }
                        if(!empty($data["placeword-8"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-8"]), Item::get($data["placeid-8"], $data["placedamage-8"]));
                        }
                        if(!empty($data["placeword-9"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-9"]), Item::get($data["placeid-9"], $data["placedamage-9"]));
                        }
                        $this->getServer()->addRecipe($recipedata);
                    }else{
                        $recipedata = (new ShapedRecipe(Item::get($data["result-id"], $data["result-damage"], $data["result-amount"])->setNamedTag(NBT::parseJSON("{display:{Name:".$data["result-name"]."}")),$data["placement-1"],$data["placement-2"],$data["placement-3"]));
                        if(!empty($data["placeword-1"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-1"]), Item::get($data["placeid-1"], $data["placedamage-1"]));
                        }
                        if(!empty($data["placeword-2"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-2"]), Item::get($data["placeid-2"], $data["placedamage-2"]));
                        }
                        if(!empty($data["placeword-3"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-3"]), Item::get($data["placeid-3"], $data["placedamage-3"]));
                        }
                        if(!empty($data["placeword-4"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-4"]), Item::get($data["placeid-4"], $data["placedamage-4"]));
                        }
                        if(!empty($data["placeword-5"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-5"]), Item::get($data["placeid-5"], $data["placedamage-5"]));
                        }
                        if(!empty($data["placeword-6"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-6"]), Item::get($data["placeid-6"], $data["placedamage-6"]));
                        }
                        if(!empty($data["placeword-7"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-7"]), Item::get($data["placeid-7"], $data["placedamage-7"]));
                        }
                        if(!empty($data["placeword-8"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-8"]), Item::get($data["placeid-8"], $data["placedamage-8"]));
                        }
                        if(!empty($data["placeword-9"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-9"]), Item::get($data["placeid-9"], $data["placedamage-9"]));
                        }
                        
                        $this->getServer()->addRecipe($recipedata);
                    }
                    break;
                    
                case "BigShapedRecipe":
                    if(empty($data["result-name"])){
                        $recipedata = (new BigShapedRecipe(Item::get($data["result-id"], $data["result-damage"], $data["result-amount"]),$data["placement-1"],$data["placement-2"],$data["placement-3"]));
                        if(!empty($data["placeword-1"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-1"]), Item::get($data["placeid-1"], $data["placedamage-1"]));
                        }
                        if(!empty($data["placeword-2"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-2"]), Item::get($data["placeid-2"], $data["placedamage-2"]));
                        }
                        if(!empty($data["placeword-3"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-3"]), Item::get($data["placeid-3"], $data["placedamage-3"]));
                        }
                        if(!empty($data["placeword-4"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-4"]), Item::get($data["placeid-4"], $data["placedamage-4"]));
                        }
                        if(!empty($data["placeword-5"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-5"]), Item::get($data["placeid-5"], $data["placedamage-5"]));
                        }
                        if(!empty($data["placeword-6"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-6"]), Item::get($data["placeid-6"], $data["placedamage-6"]));
                        }
                        if(!empty($data["placeword-7"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-7"]), Item::get($data["placeid-7"], $data["placedamage-7"]));
                        }
                        if(!empty($data["placeword-8"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-8"]), Item::get($data["placeid-8"], $data["placedamage-8"]));
                        }
                        if(!empty($data["placeword-9"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-9"]), Item::get($data["placeid-9"], $data["placedamage-9"]));
                        }
                        
                        $this->getServer()->addRecipe($recipedata);
                    }else{
                        $recipedata = (new BigShapedRecipe(Item::get($data["result-id"], $data["result-damage"], $data["result-amount"])->setNamedTag(NBT::parseJSON("{display:{Name:".$data["result-name"]."}")),$data["placement-1"],$data["placement-2"],$data["placement-3"]));
                        if(!empty($data["placeword-1"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-1"]), Item::get($data["placeid-1"], $data["placedamage-1"]));
                        }
                        if(!empty($data["placeword-2"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-2"]), Item::get($data["placeid-2"], $data["placedamage-2"]));
                        }
                        if(!empty($data["placeword-3"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-3"]), Item::get($data["placeid-3"], $data["placedamage-3"]));
                        }
                        if(!empty($data["placeword-4"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-4"]), Item::get($data["placeid-4"], $data["placedamage-4"]));
                        }
                        if(!empty($data["placeword-5"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-5"]), Item::get($data["placeid-5"], $data["placedamage-5"]));
                        }
                        if(!empty($data["placeword-6"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-6"]), Item::get($data["placeid-6"], $data["placedamage-6"]));
                        }
                        if(!empty($data["placeword-7"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-7"]), Item::get($data["placeid-7"], $data["placedamage-7"]));
                        }
                        if(!empty($data["placeword-8"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-8"]), Item::get($data["placeid-8"], $data["placedamage-8"]));
                        }
                        if(!empty($data["placeword-9"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-9"]), Item::get($data["placeid-9"], $data["placedamage-9"]));
                        }
                        
                        $this->getServer()->addRecipe($recipedata);
                    }
                    break;
                    
                case "FurnaceRecipe":
                    if(empty($data["result-name"])){
                        $recipedata = (new FurnaceRecipe(Item::get($data["result-id"], $data["result-damage"], $data["result-amount"]),$data["placement-1"],$data["placement-2"],$data["placement-3"]));
                        if(!empty($data["placeword-1"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-1"]), Item::get($data["placeid-1"], $data["placedamage-1"]));
                        }
                        if(!empty($data["placeword-2"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-2"]), Item::get($data["placeid-2"], $data["placedamage-2"]));
                        }
                        if(!empty($data["placeword-3"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-3"]), Item::get($data["placeid-3"], $data["placedamage-3"]));
                        }
                        if(!empty($data["placeword-4"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-4"]), Item::get($data["placeid-4"], $data["placedamage-4"]));
                        }
                        if(!empty($data["placeword-5"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-5"]), Item::get($data["placeid-5"], $data["placedamage-5"]));
                        }
                        if(!empty($data["placeword-6"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-6"]), Item::get($data["placeid-6"], $data["placedamage-6"]));
                        }
                        if(!empty($data["placeword-7"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-7"]), Item::get($data["placeid-7"], $data["placedamage-7"]));
                        }
                        if(!empty($data["placeword-8"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-8"]), Item::get($data["placeid-8"], $data["placedamage-8"]));
                        }
                        if(!empty($data["placeword-9"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-9"]), Item::get($data["placeid-9"], $data["placedamage-9"]));
                        }
                        
                        $this->getServer()->addRecipe($recipedata);
                    }else{
                        $recipedata = (new FurnaceRecipe(Item::get($data["result-id"], $data["result-damage"], $data["result-amount"])->setNamedTag(NBT::parseJSON("{display:{Name:".$data["result-name"]."}")),$data["placement-1"],$data["placement-2"],$data["placement-3"]));
                        if(!empty($data["placeword-1"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-1"]), Item::get($data["placeid-1"], $data["placedamage-1"]));
                        }
                        if(!empty($data["placeword-2"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-2"]), Item::get($data["placeid-2"], $data["placedamage-2"]));
                        }
                        if(!empty($data["placeword-3"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-3"]), Item::get($data["placeid-3"], $data["placedamage-3"]));
                        }
                        if(!empty($data["placeword-4"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-4"]), Item::get($data["placeid-4"], $data["placedamage-4"]));
                        }
                        if(!empty($data["placeword-5"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-5"]), Item::get($data["placeid-5"], $data["placedamage-5"]));
                        }
                        if(!empty($data["placeword-6"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-6"]), Item::get($data["placeid-6"], $data["placedamage-6"]));
                        }
                        if(!empty($data["placeword-7"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-7"]), Item::get($data["placeid-7"], $data["placedamage-7"]));
                        }
                        if(!empty($data["placeword-8"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-8"]), Item::get($data["placeid-8"], $data["placedamage-8"]));
                        }
                        if(!empty($data["placeword-9"])){
                            $recipedata->setIngredient(strtoupper($data["placeword-9"]), Item::get($data["placeid-9"], $data["placedamage-9"]));
                        }
                        
                        $this->getServer()->addRecipe($recipedata);
                    }
                    break;
            }
        }
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(\count($args) == 0){
            $sender->sendMessage("§7======= §aCustomRecipe Command §7=======\n§e/cr §6reload §f| §bReload CustomRecipe Configuration and Apply\n§7====================================");
            return;
        }
        if($args[0] == "reload"){
            $sender->sendMessage("§8[§aCustomRecipe§8] §eReloading and Applying Recipe...");
            $this->registerRecipe();
            $sender->sendMessage("§8[§aCustomRecipe§8] §eReloaded and Applied Recipe");
        }
    }
    
}