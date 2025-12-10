# Moodle AI Provider Plugin: aiprovider_openai_compatible_v1

## Overview
This plugin implements an AI provider for Moodle using a Rust FFI-based OpenAI-compatible interface.
It wraps the external AI subsystem in a thin PHP layer and leverages a Rust shared library for performance.

## Directory Structure
plugins/ai/provider/aiprovider_openai_compatible_v1/  
├── classes/  
│   ├── provider.php  
│   └── process_generate_text.php  
├── db/  
│   └── hooks.php  
├── lang/  
│   └── en/aiprovider_openai_compatible_v1.php  
├── settings.php  
├── version.php  
└── target/release/librust_openapi.so  

## Rust Library (FFI)
The Rust crate lives under `packages/moodle-wasm-example/` (or your custom path).  
Build with:
```bash
cd packages/moodle-wasm-example
cargo build --release
```
Copy the compiled `.so` to:  
`plugins/ai/provider/aiprovider_openai_compatible_v1/target/release/librust_openapi.so`

## Configuration
Navigate to **Site administration > AI > AI providers**, select **Add new provider**.  
Enter required settings (e.g. library path) under `Rust shared library path`.  
Ensure the path matches the plugin directory structure.

## Usage
After configuration, use core AI features (generate text) via Moodle UI or via placement plugins.  
The provider uses [`provider.php`](plugins/ai/provider/aiprovider_openai_compatible_v1/classes/provider.php) to call the Rust FFI.

## Docker Setup
Mount the plugin and `target/release` directory into your Moodle container:
```yaml
volumes:
  - ./plugins/ai/provider/aiprovider_openai_compatible_v1:/var/www/html/moodle/plugins/ai/provider/aiprovider_openai_compatible_v1
  - ./plugins/ai/provider/aiprovider_openai_compatible_v1/target/release:/var/www/html/moodle/plugins/ai/provider/aiprovider_openai_compatible_v1/target/release
```

## Development
- Update PHP classes under `classes/`  
- Rebuild the Rust library and redeploy the `.so`  
- Clear Moodle caches: `php admin/cli/purge_caches.php`