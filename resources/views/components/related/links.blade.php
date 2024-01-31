@use('App\Enums\Section')

<x-related.links-section :model="$model" section="skill" icon="{{ Section::Skills->getUiIcon() }}" />
<x-related.links-section :model="$model" section="experience" icon="public" />
<x-related.links-section :model="$model" section="project" icon="{{ Section::Projects->getUiIcon() }}" />
<x-related.links-section :model="$model" section="demo" icon="smart_toy" />
<x-related.links-section :model="$model" section="post" icon="article" />