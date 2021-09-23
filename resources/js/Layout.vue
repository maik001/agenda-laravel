<template>
  <main>
    <header>
      <Link href="/">Principal</Link>
      <Link href="/inserir"> Inserir</Link>
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Link,
  }
}
</script>

<style>

</style>
