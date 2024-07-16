# Create sandstone Metro tunnel from current position to 100 blocks south (positive Z)

## Glass tunnel base
fill ~-2 ~-1 ~ ~2 ~3 ~100 minecraft:glass hollow

## Back wall arch
fill ~2 ~-1 ~ ~-2 ~3 ~ minecraft:cut_sandstone
fill ~-1 ~ ~ ~1 ~2 ~ minecraft:air

## Stone floor
fill ~-2 ~-1 ~ ~2 ~-1 ~100 minecraft:sandstone

## Center beam
fill ~ ~-1 ~ ~ ~-2 ~100 minecraft:cut_sandstone

## Redstone rail
fill ~ ~ ~ ~ ~ ~100 minecraft:powered_rail

## Place redstone torches on every 10th block until 100
fill ~1 ~ ~ ~1 ~ ~ minecraft:redstone_torch
fill ~1 ~ ~10 ~1 ~ ~10 minecraft:redstone_torch
fill ~1 ~ ~20 ~1 ~ ~20 minecraft:redstone_torch
fill ~1 ~ ~30 ~1 ~ ~30 minecraft:redstone_torch
fill ~1 ~ ~40 ~1 ~ ~40 minecraft:redstone_torch
fill ~1 ~ ~50 ~1 ~ ~50 minecraft:redstone_torch
fill ~1 ~ ~60 ~1 ~ ~60 minecraft:redstone_torch
fill ~1 ~ ~70 ~1 ~ ~70 minecraft:redstone_torch
fill ~1 ~ ~80 ~1 ~ ~80 minecraft:redstone_torch
fill ~1 ~ ~90 ~1 ~ ~90 minecraft:redstone_torch

## Pillars deep into the ground every 10th block until 100
fill ~ ~-100 ~ ~ ~-1 ~ minecraft:cut_sandstone
fill ~ ~-100 ~10 ~ ~-1 ~10 minecraft:cut_sandstone
fill ~ ~-100 ~20 ~ ~-1 ~20 minecraft:cut_sandstone
fill ~ ~-100 ~30 ~ ~-1 ~30 minecraft:cut_sandstone
fill ~ ~-100 ~40 ~ ~-1 ~40 minecraft:cut_sandstone
fill ~ ~-100 ~50 ~ ~-1 ~50 minecraft:cut_sandstone
fill ~ ~-100 ~60 ~ ~-1 ~60 minecraft:cut_sandstone
fill ~ ~-100 ~70 ~ ~-1 ~70 minecraft:cut_sandstone
fill ~ ~-100 ~80 ~ ~-1 ~80 minecraft:cut_sandstone
fill ~ ~-100 ~90 ~ ~-1 ~90 minecraft:cut_sandstone

