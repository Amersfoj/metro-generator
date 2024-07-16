# Create sandstone Metro tunnel from current position to 100 blocks west (negative X)

## Glass tunnel base
fill ~ ~-1 ~-2 ~-100 ~3 ~2 minecraft:glass hollow

## Back wall arch
fill ~ ~-1 ~2 ~ ~3 ~-2 minecraft:cut_sandstone
fill ~ ~ ~-1 ~ ~2 ~1 minecraft:air

## Stone floor
fill ~ ~-1 ~-2 ~-100 ~-1 ~2 minecraft:sandstone

## Center beam
fill ~ ~-1 ~ ~-100 ~-2 ~ minecraft:cut_sandstone

## Redstone rail
fill ~ ~ ~ ~-100 ~ ~ minecraft:powered_rail

## Place redstone torches on every 10th block until 100
fill ~ ~ ~1 ~ ~ ~1 minecraft:redstone_torch
fill ~-10 ~ ~1 ~-10 ~ ~1 minecraft:redstone_torch
fill ~-20 ~ ~1 ~-20 ~ ~1 minecraft:redstone_torch
fill ~-30 ~ ~1 ~-30 ~ ~1 minecraft:redstone_torch
fill ~-40 ~ ~1 ~-40 ~ ~1 minecraft:redstone_torch
fill ~-50 ~ ~1 ~-50 ~ ~1 minecraft:redstone_torch
fill ~-60 ~ ~1 ~-60 ~ ~1 minecraft:redstone_torch
fill ~-70 ~ ~1 ~-70 ~ ~1 minecraft:redstone_torch
fill ~-80 ~ ~1 ~-80 ~ ~1 minecraft:redstone_torch
fill ~-90 ~ ~1 ~-90 ~ ~1 minecraft:redstone_torch

## Pillars deep into the ground every 10th block until 100
fill ~ ~-100 ~ ~ ~-1 ~ minecraft:cut_sandstone
fill ~-10 ~-100 ~ ~-10 ~-1 ~ minecraft:cut_sandstone
fill ~-20 ~-100 ~ ~-20 ~-1 ~ minecraft:cut_sandstone
fill ~-30 ~-100 ~ ~-30 ~-1 ~ minecraft:cut_sandstone
fill ~-40 ~-100 ~ ~-40 ~-1 ~ minecraft:cut_sandstone
fill ~-50 ~-100 ~ ~-50 ~-1 ~ minecraft:cut_sandstone
fill ~-60 ~-100 ~ ~-60 ~-1 ~ minecraft:cut_sandstone
fill ~-70 ~-100 ~ ~-70 ~-1 ~ minecraft:cut_sandstone
fill ~-80 ~-100 ~ ~-80 ~-1 ~ minecraft:cut_sandstone
fill ~-90 ~-100 ~ ~-90 ~-1 ~ minecraft:cut_sandstone
