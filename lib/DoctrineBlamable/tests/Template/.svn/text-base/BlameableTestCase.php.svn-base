<?php
/*
 *  $Id$
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.phpdoctrine.org>.
 */

/**
 * Doctrine_Template_Blameable_TestCase
 *
 * @package     Doctrine
 * @author      Colin DeCarlo <cdecarlo@gmail.com>
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @category    Object Relational Mapping
 * @link        www.phpdoctrine.org
 * @since       1.2
 * @version     $Revision$
 */
class Doctrine_Template_Blameable_TestCase extends Doctrine_UnitTestCase 
{
    
    public function prepareTables()
    {
        $this->tables[] = 'Template_Blameable_TableName_Default_Columns_Globals';
        $this->tables[] = 'Template_Blameable_TableName_Default_Columns_Session';
        $this->tables[] = 'Template_Blameable_TableName_Custom_Columns_Session';
        $this->tables[] = 'Template_Blameable_TableName_Literal_Default_Session';
        $this->tables[] = 'Template_Blameable_TableName_Dql_Default_Session';
        $this->tables[] = 'Template_Blameable_TableName_With_Alias_Session';
        $this->tables[] = 'Template_Blameable_TableName_Default_Columns_With_Relations_Session';
        
        parent::prepareTables();
    }

    public function testCli()
    {
    	if (PHP_SAPI === 'cli') {
    		$this->cliTestShouldInsertUserIdFromGlobals();
    	} else {
    		$this->pass();
    	}
    }
    
    public function testBrowser()
    {
        if (PHP_SAPI !== 'cli') {
       	    $this->browserTestShouldInsertUserIdFromSession();
            $this->browserTestShouldInsertUsernameFromSession();
            $this->browserTestShouldInsertUserIdFromLiteralDefault();
            $this->browserTestShouldInsertUserIdFromDqlDefault();
            $this->browserTestShouldInsertUserIdWithAliasFromSession();
            $this->browserTestShouldInsertUserIdFromSessionBasedOnRelatedUser();
        } else {
        	$this->pass();
        }
    } 
    
    public function testShouldThrowAConnectionException()
    {

       try {
           $elem = new Template_Blameable_TableName_Default_Columns_Globals();
           $elem->save();
           
           $this->fail("Not Null Constraint Missed");
       } catch (Doctrine_Connection_Sqlite_Exception $e) {
       	    $this->pass();
       }
    
    }

    public function cliTestShouldInsertUserIdFromGlobals()
    {
        if (PHP_SAPI === 'cli') {
           $GLOBALS['userId'] = 42;
           
           $elem = new Template_Blameable_TableName_Default_Columns_Globals();
           $elem->save();
           
           $this->assertEqual($elem['created_by'], $GLOBALS['userId']);
           
           unset($GLOBALS['userId']);
       } else {
           $this->pass();
       }
    }
    
    public function browserTestShouldInsertUserIdFromSession()
    {

        $elem = new Template_Blameable_TableName_Default_Columns_Session();
        
        $session = $elem->getTable()->getRecordListener()->get('Blameable')->getSession();
        $session->userId = 42;
        $elem->save();
        
        $this->assertEqual($elem['created_by'], $session->userId);
        
    }
    
    public function browserTestShouldInsertUsernameFromSession()
    {

        $elem = new Template_Blameable_TableName_Custom_Columns_Session();
        
        $session = $elem->getTable()->getRecordListener()->get('Blameable')->getSession();
        $session->username = 'Colin DeCarlo';
        $elem->save();
        
        $this->assertEqual($elem['created_by'], $session->username);
        
    }
    
    public function browserTestShouldInsertUserIdFromLiteralDefault()
    {

        $elem = new Template_Blameable_TableName_Literal_Default_Session();
        $elem->save();

        $this->assertEqual($elem['created_by'], 1337);
        
    }
    
    public function browserTestShouldInsertUserIdFromDqlDefault()
    {

        $elem = new Template_Blameable_TableName_Dql_Default_Session();
        $elem->save();
        
        $user = Doctrine_Query::create()
            ->from('User')
            ->where('name = ?','Arnold Schwarzenegger')
            ->fetchOne(array(),Doctrine::HYDRATE_ARRAY);
        
        $this->assertEqual($elem['created_by'], $user['id']);
        
    }
    
    public function browserTestShouldInsertUserIdWithAliasFromSession()
    {

        $elem = new Template_Blameable_TableName_With_Alias_Session();
        
        $session = $elem->getTable()->getRecordListener()->get('Blameable')->getSession();
        $session->userId = 42;
        $elem->save();
        
        $this->assertEqual($elem['author'], $session->userId);
        
    }
    
    public function browserTestShouldInsertUserIdFromSessionBasedOnRelatedUser()
    {

        $elem = new Template_Blameable_TableName_Default_Columns_With_Relations_Session();
        
        $session = $elem->getTable()->getRecordListener()->get('Blameable')->getSession();
        
        $user = Doctrine_Query::create()
            ->from('User')
            ->where('name = ?','Arnold Schwarzenegger')
            ->fetchOne();
        $session->userId = $user['id'];
        $elem->save();
        
        $elem->loadReference('CreatedBy');
        
        $this->assertIdentical($elem['CreatedBy'], $user);
        
    }
}

class Template_Blameable_TableName_Default_Columns_Globals extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
    }

    public function setUp()
    {
        $this->actAs(new Doctrine_Template_Blameable(array('columns' => array('updated' => array('disabled' => true)))));
    }
}

class Template_Blameable_TableName_Default_Columns_Session extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
    }

    public function setUp()
    {
        $this->actAs(new Doctrine_Template_Blameable(array('listener' => 'BlameableTestListener',
                                                           'columns' => array('updated' => array('disabled' => true)),
                                                           )));
    }
}

class Template_Blameable_TableName_Custom_Columns_Session extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
    }

    public function setUp()
    {
        $this->actAs(new Doctrine_Template_Blameable(array('listener' => 'BlameableTestListener',
                                                           'blameVar' => 'username',
                                                           'columns' => array('created' => array('type'   => 'string',
                                                                                                 'length' => 255),
                                                                              'updated' => array('disabled' => true)
                                                                              )
                                                           )
                                                     ));
    }
}

class Template_Blameable_TableName_Literal_Default_Session extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
    }

    public function setUp()
    {
        $this->actAs(new Doctrine_Template_Blameable(array('listener' => 'BlameableTestListener',
                                                           'default' => 1337,
                                                           'columns' => array('updated' => array('disabled' => true)),
                                                           )));
    }
}

class Template_Blameable_TableName_Dql_Default_Session extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
    }

    public function setUp()
    {
        $this->actAs(new Doctrine_Template_Blameable(array('listener' => 'BlameableTestListener',
                                                           'blameVar' => 'id',
                                                           'default' => 'from User where name = ?',
                                                           'params'  => 'Arnold Schwarzenegger',
                                                           'columns' => array('updated' => array('disabled' => true)),
                                                           )));
    }
}

class Template_Blameable_TableName_With_Alias_Session extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
    }

    public function setUp()
    {
        $this->actAs(new Doctrine_Template_Blameable(array('listener' => 'BlameableTestListener',
                                                           'columns' => array('created' => array('alias' => 'author'),
                                                                              'updated' => array('disabled' => true)),
                                                           )));
    }
}

class Template_Blameable_TableName_Default_Columns_With_Relations_Session extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 8, array('primary' => true, 'autoincrement' => true));
    }

    public function setUp()
    {
        $this->actAs(new Doctrine_Template_Blameable(array('listener' => 'BlameableTestListener',
                                                           'columns' => array('updated' => array('disabled' => true)),
                                                           'relations' => array('created' => array('disabled' => false),
                                                           ))));
    }
}


class BlameableTestListener extends Doctrine_Template_Listener_Blameable
{
	
    protected $_session = null;
    
    public function __construct(array $options)
    {
        $this->_session = new SimpleSession();
        
        parent::__construct($options);
    }
    
    public function getUserIdentity()
    {
        if (PHP_SAPI === 'cli') {
            $ident = isset($GLOBALS[$this->_options['blameVar']]) ? $GLOBALS[$this->_options['blameVar']] : null;
        } else {
            $ident = isset($this->_session[$this->_options['blameVar']]) ? $this->_session[$this->_options['blameVar']] : null;    
        }
    	
        if (is_null($ident) && $this->_options['default'] !== false) {
            if (is_null($this->_default)) {
        	
                /*
                 * Try to parse the default value as a dql string, if that fails
                 * set the default value equal to the literal value of the string
                 */
    
                try {
                    $default = Doctrine_Query::create()
                        ->parseDqlQuery($this->_options['default'])
                        ->fetchOne($this->_options['params']);
    
                    $this->_default = $default[$this->_options['blameVar']];
                } catch (Doctrine_Query_Tokenizer_Exception $e) {
                    $this->_default = $this->_options['default'];
                }
            }
            
            $ident = $this->_default;
            
        }
        
        return $ident;    
        
    }
    
    public function getSession()
    {
    	return $this->_session;
    }
    
}

class SimpleSession implements ArrayAccess
{
  protected $_session = array();

  public function __get($offset)
  {
    return isset($this->_session[$offset]) ? $this->_session[$offset] : null;
  }

  public function __set($offset, $value)
  {
    $this->_session[$offset] = $value;
    return true;
  }

  public function offsetExists($offset)
  {
    return array_key_exists($offset, $this->_session);
  }

  public function offsetGet($offset)
  {
    return $this->__get($offset);
  }

  public function offsetSet($offset, $value)
  {
    return $this->__set($offset, $value);
  }

  public function offsetUnset($offset)
  {
    unset($this->_session[$offset]);
    return true;
  }
  
}
