#define FFI_SCOPE "ZEngine"

typedef int64_t zend_long;
typedef uint64_t zend_ulong;
typedef uint32_t uint32_t;

typedef unsigned char zend_bool;
typedef unsigned char zend_uchar;

typedef struct _zend_string zend_string;

struct _zend_class_entry {
    char type;
    zend_string *name;
    void *parent;
    int refcount;
    uint32_t ce_flags;
    
    // Simplified structure - only what we need
    int default_properties_count;
    int default_static_members_count;
    void *default_properties_table;
    void *default_static_members_table;
    void *static_members_table;
    void *function_table;
    void *properties_info;
    void *constants_table;
    void *properties_info_table;
    
    // Trait-related fields
    int num_traits;
    void *trait_names;
    void *trait_aliases;
    void *trait_precedences;
};

typedef struct _zend_class_entry zend_class_entry;