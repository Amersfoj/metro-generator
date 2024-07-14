## Create sandstone Metro station on current position

# Base block
fill ~-2 ~-1 ~-2 ~2 ~3 ~2 minecraft:cut_sandstone hollow
# open the walls
fill ~-1 ~ ~-2 ~1 ~2 ~2 minecraft:air
fill ~-2 ~ ~-1 ~2 ~2 ~1 minecraft:air
# add cornerstone
setblock ~-2 ~1 ~-2 minecraft:chiseled_sandstone
setblock ~2 ~1 ~-2 minecraft:chiseled_sandstone
setblock ~-2 ~1 ~2 minecraft:chiseled_sandstone
setblock ~2 ~1 ~2 minecraft:chiseled_sandstone



# pillar
fill ~0 ~-100 ~ ~0 ~-1 ~ minecraft:cut_sandstone
## pillar supports
# west supports
setblock ~-1 ~-2 ~ minecraft:smooth_sandstone_stairs[facing=west,half=bottom] keep
setblock ~-2 ~-2 ~ minecraft:smooth_sandstone_stairs[facing=east,half=top] keep
setblock ~-1 ~-3 ~ minecraft:smooth_sandstone_stairs[facing=east,half=top] keep
# east supports
setblock ~1 ~-2 ~ minecraft:smooth_sandstone_stairs[facing=east,half=bottom] keep
setblock ~2 ~-2 ~ minecraft:smooth_sandstone_stairs[facing=west,half=top] keep
setblock ~1 ~-3 ~ minecraft:smooth_sandstone_stairs[facing=west,half=top] keep
# north supports
setblock ~ ~-2 ~-1 minecraft:smooth_sandstone_stairs[facing=north,half=bottom] keep
setblock ~ ~-2 ~-2 minecraft:smooth_sandstone_stairs[facing=south,half=top] keep
setblock ~ ~-3 ~-1 minecraft:smooth_sandstone_stairs[facing=south,half=top] keep
# south supports
setblock ~ ~-2 ~1 minecraft:smooth_sandstone_stairs[facing=south,half=bottom] keep
setblock ~ ~-2 ~2 minecraft:smooth_sandstone_stairs[facing=north,half=top] keep
setblock ~ ~-3 ~1 minecraft:smooth_sandstone_stairs[facing=north,half=top] keep

## roof
# West and east:
fill ~-1 ~4 ~-1 ~-1 ~4 ~1 minecraft:smooth_sandstone_stairs[facing=east]
fill ~1 ~4 ~-1 ~1 ~4 ~1 minecraft:smooth_sandstone_stairs[facing=west]
# Single north and south blocks, connects them
setblock ~ ~4 ~-1 minecraft:smooth_sandstone_stairs[facing=south]
setblock ~ ~4 ~1 minecraft:smooth_sandstone_stairs[facing=north]
# Slab on top
setblock ~ ~5 ~ minecraft:cut_sandstone_slab