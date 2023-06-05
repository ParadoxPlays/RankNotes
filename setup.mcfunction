execute @a[tag=setuponce] ~~~ tag @a add setuponce
tp @s ~ 300 ~
tp @s @e[type=npc,name="origins"]
#execute @s[tag=!setuponce] ~~~ fill ~1 252 ~1 ~-1 255 ~-1 barrier 0 hollow
#execute @s[tag=!setuponce] ~~~ kill @e[type=npc,name="origins"]
execute @s[tag=!setuponce] ~~~ kill @e[name="origins"]
execute @s[tag=!setuponce] ~~~ summon npc "origins"
execute @s[tag=!setuponce] ~~~ tag @e[type=npc,name="origins",c=1] add setupselect
execute @s[tag=!setuponce] ~~~ execute @e[tag=setupselect] ~~~ kill @e[r=3,type=npc,tag=!setupselect]
execute @s[tag=!setuponce] ~~~ tag @e remove setupselect
execute @s[tag=!setuponce] ~~~ tickingarea add ~~~ ~~~ "origins"
execute @s[tag=!setuponce] ~~~ tickingarea add 0 500 0 0 500 0 "data"
#execute @s[tag=!setuponce] ~~~ scoreboard objectives add tick dummy
execute @s[tag=!setuponce] ~~~ scoreboard objectives add tick2 dummy
execute @s[tag=!setuponce] ~~~ scoreboard objectives add tick4 dummy
execute @s[tag=!setuponce] ~~~ scoreboard objectives add tick10 dummy
execute @s[tag=!setuponce] ~~~ scoreboard objectives add tick20 dummy
execute @s[tag=!setuponce] ~~~ scoreboard objectives add tick40 dummy
execute @s[tag=!setuponce] ~~~ scoreboard objectives add tick100 dummy
execute @s[tag=!setuponce] ~~~ scoreboard objectives add UI-Location dummy
execute @s[tag=!setuponce] ~~~ gamerule sendcommandfeedback false
execute @s[tag=!setuponce] ~~~ gamerule showtags false





replaceitem entity @s slot.armor.head 0 minecraft:carved_pumpkin
dialogue open @e[type=npc,name="origins"] @s info
give @a[name=Notch] origins:removed
tag @s add setup
tag @s add setuponce