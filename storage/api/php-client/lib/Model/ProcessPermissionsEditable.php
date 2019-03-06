<?php
/**
 * ProcessPermissionsEditable
 *
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * ProcessMaker API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * OpenAPI spec version: 1.0.0
 * Contact: info@processmaker.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.0.0-beta2
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * ProcessPermissionsEditable Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ProcessPermissionsEditable implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'processPermissionsEditable';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'process_id' => 'int',
        'permission_id' => 'int',
        'assignable_id' => 'int',
        'assignable_type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'id' => 'id',
        'process_id' => 'id',
        'permission_id' => 'id',
        'assignable_id' => 'id',
        'assignable_type' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'process_id' => 'process_id',
        'permission_id' => 'permission_id',
        'assignable_id' => 'assignable_id',
        'assignable_type' => 'assignable_type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'process_id' => 'setProcessId',
        'permission_id' => 'setPermissionId',
        'assignable_id' => 'setAssignableId',
        'assignable_type' => 'setAssignableType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'process_id' => 'getProcessId',
        'permission_id' => 'getPermissionId',
        'assignable_id' => 'getAssignableId',
        'assignable_type' => 'getAssignableType'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['process_id'] = isset($data['process_id']) ? $data['process_id'] : null;
        $this->container['permission_id'] = isset($data['permission_id']) ? $data['permission_id'] : null;
        $this->container['assignable_id'] = isset($data['assignable_id']) ? $data['assignable_id'] : null;
        $this->container['assignable_type'] = isset($data['assignable_type']) ? $data['assignable_type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int|null $id Represents a Process permission.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets process_id
     *
     * @return int|null
     */
    public function getProcessId()
    {
        return $this->container['process_id'];
    }

    /**
     * Sets process_id
     *
     * @param int|null $process_id Represents a Process permission.
     *
     * @return $this
     */
    public function setProcessId($process_id)
    {
        $this->container['process_id'] = $process_id;

        return $this;
    }

    /**
     * Gets permission_id
     *
     * @return int|null
     */
    public function getPermissionId()
    {
        return $this->container['permission_id'];
    }

    /**
     * Sets permission_id
     *
     * @param int|null $permission_id Represents a Process permission.
     *
     * @return $this
     */
    public function setPermissionId($permission_id)
    {
        $this->container['permission_id'] = $permission_id;

        return $this;
    }

    /**
     * Gets assignable_id
     *
     * @return int|null
     */
    public function getAssignableId()
    {
        return $this->container['assignable_id'];
    }

    /**
     * Sets assignable_id
     *
     * @param int|null $assignable_id Represents a Process permission.
     *
     * @return $this
     */
    public function setAssignableId($assignable_id)
    {
        $this->container['assignable_id'] = $assignable_id;

        return $this;
    }

    /**
     * Gets assignable_type
     *
     * @return string|null
     */
    public function getAssignableType()
    {
        return $this->container['assignable_type'];
    }

    /**
     * Sets assignable_type
     *
     * @param string|null $assignable_type Represents a Process permission.
     *
     * @return $this
     */
    public function setAssignableType($assignable_type)
    {
        $this->container['assignable_type'] = $assignable_type;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


